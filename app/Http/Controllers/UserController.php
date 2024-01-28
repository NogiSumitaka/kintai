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
            'user' => $user,
            'latestWorkingStatus' => $latestWorkingStatus,
            ]);
    }
    
    /* Show manegement view */
    public function manegement(Request $request, User $user)
    {
        $users = $user->get();
        
        /*勤怠状況でユーザーを分ける*/
        $n = 0;
        $i = 0;
        $j = 0;
        $k = 0;
    
        $close_users = array();
        $break_users = array();
        $attend_users = array();
        $new_users = array(); /* 新規登録者でまだ勤怠時間データがないuser*/
        
        foreach( $users as $user ){
            if(empty($user->getLatestWorkingStatus())){
                $new_users[$n] = $user;
                $n++;
            } else {
                $work_time = $user->times()->orderBy('created_at', 'DESC')->first();
                $status = $work_time->working_status;
        
                if ($status == "退勤") {
                    $close_users[$i] = $user;
                    $i++;
                } elseif ($status == "休憩") {
                    $break_users[$j] = $user;
                    $j++;
                } else {
                    $attend_users[$k] = $user;
                    $k++;
                }
            }
        };
        
        return view('manegements.manegement')->with([
            'attend_users' => $attend_users,
            'break_users' => $break_users,
            'close_users' => $close_users,
            'new_users' => $new_users,
            ]);
    }
    
    public function show(User $user)
    {
        return view('manegements.employee')->with([
            'user' => $user,
            ]);
    }
    
    /* Show attendance report form*/
    public function attend_form(Request $request)
    {
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $latestWorkingStatus = $user->getLatestWorkingStatus();
        if (empty($latestWorkingStatus)){
            return view('reports.attend');
        } else {
            $workingStatus = $user->getLatestWorkingStatus()->working_status;
            if ($workingStatus == "退勤"){
                return view('reports.attend');
            } else {
                return view('reports.allready')->with(['latestWorkingStatus' => $workingStatus]);
            }
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
        $user->times()->create([
            "user_id" => $user_id,
            "working_status" => "出勤",
            ]);
        
        return redirect(route('dashboard'));
    }
    
    public function breaktime_form(Request $request)
    {
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $latestWorkingStatus = $user->getLatestWorkingStatus();
        if (empty($latestWorkingStatus)){
            return view('reports.error');
        } else {
            $workingStatus = $user->getLatestWorkingStatus()->working_status;
            if ($workingStatus == "出勤"){
                return view('reports.breaktime');
            } elseif ($workingStatus == "休憩"){
                return view('reports.breaktime_start');
            } else {
                return view('reports.allready')->with(['latestWorkingStatus' => $workingStatus]);
            }
        }
    }
    
    public function start(Request $request)
    {
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $user->times()->create([
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
        $latestWorkingStatus = $user->getLatestWorkingStatus();
        if(empty($latestWorkingStatus)){
            return view('reports.error');
        } else {
            $workingStatus = $user->getLatestWorkingStatus()->working_status;
            if ($workingStatus != "退勤"){
                return view('reports.close');
            } else {
                return view('reports.allready')->with(['latestWorkingStatus' => $workingStatus]);
            }
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
