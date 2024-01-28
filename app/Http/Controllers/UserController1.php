<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Style;
use App\Models\Place;

class UserController extends Controller
{
    /* Show dashboard */
    public function dashboard(Request $request)
    {
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $latestWorkingStatus = $user->getLatestWorkingStatus();
        return view('dashboard')->with([
            'latestWorkingStatus' => $latestWorkingStatus,
            ]);
    }
    
    /* Show manegement view */
    public function manegement(Request $request, User $user)
    {
        return view('manegements.manegement')->with([
            'user' => $request->user(),
            ]);
    }
    
    /* Show attendance report form*/
    public function attend_form(Request $request, User $user, Style $style, Place $place)
    {
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $latestWorkingStatus = $user->getLatestWorkingStatus()->working_status;
        if ($latestWorkingStatus == "退勤"){
            return view('reports.attend')->with([
                "styles" => $style,
                "places" => $place,
                ]);
        } else {
            return view('reports.allready')->with(['latestWorkingStatus' => $latestWorkingStatus]);
        }
        
    }
    
    /* Save attendance report */
    public function save_report(Request $request)
    {
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $user->update([
            "style_id" => $request->style_id,
            "place_id" => $request->place_id,
            ]);
        $user->work_times()->create([
            "user_id" => $user_id,
            "working_status" => "出勤",
            ]);
        
        return redirect(route('dashboard'));
    }
    
    public function breaktime_form(Request $request)
    {
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $latestWorkingStatus = $user->getLatestWorkingStatus()->working_status;
        if ($latestWorkingStatus == "出勤"){
            return view('reports.breaktime');
        } elseif ($latestWorkingStatus == "休憩"){
            return view('reports.breaktime_start');
        } else {
            return view('reports.allready')->with(['latestWorkingStatus' => $latestWorkingStatus]);
        }
        return view('reports.breaktime');
    }
    
    public function start(Request $request)
    {
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $user->work_times()->create([
            "user_id" => $user_id,
            "working_status" => "休憩",
            ]);
            
        return view('reports.breaktime_start');
    }
    
    public function report_end(Request $request)
    {
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $user->times()->create([
            "user_id" => $user_id,
            "working_status" => "再開",
            ]);
            
        return redirect(route('dashboard'));
    }
    
    /* Show attendance report form*/
    public function closing_form(Request $request)
    {
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $latestWorkingStatus = $user->getLatestWorkingStatus()->working_status;
        if ($latestWorkingStatus != "退勤"){
            return view('reports.close');
        } else {
            return view('reports.allready')->with(['latestWorkingStatus' => $latestWorkingStatus]);
        }
    }
    
    /* Save attendance report */
    public function close(Request $request)
    {
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $user->times()->create([
            "user_id" => $user_id,
            "working_status" => "退勤",
            ]);
        
        return redirect(route('dashboard'));
    }
}