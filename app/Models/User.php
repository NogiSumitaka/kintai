<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'department_id',
        'style_id',
        'place_id',
        'name',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    public function working_style()
    {
        return $this->belongsTo(WorkingStyle::class);
    }
    
    public function working_place()
    {
        return $this->belongsTo(WorkingPlace::class);
    }
    
    public function work_times()
    {
        return $this->hasMany(WorkTime::class);
    }
    
    public function getLatestWorkingStatus()
    {
        $latestWorkingStatus = $this->work_times()->orderBy('created_at', 'DESC')->first();
        return $latestWorkingStatus;
    }
}
