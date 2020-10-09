<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Carbon\Carbon;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'is_recruiter', 'image'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function recruiter() {
        return $this->belongsTo('App\Recruiter');
    }

    public function jobseeker() {
        return $this->belongsTo('App\JobSeeker');
    }

    public function createdHuman()
    {
        $created_at = $this-> created_at->toDayDateTimeString();
        return $created_at;
    }
    public function updatedHuman()
    {
        $updated_at = $this-> updated_at->diffForHumans(Carbon::now());
        return $updated_at;
    }

    public function owns($ApplicationId) 
    {
        //retrieve $application using $ApplicationId 
        $application = Application::find($ApplicationId);

        //determine application ownership
        if ($application->jobseeker->user_id == $this->id) {
            return true;
        }
        else {
            return false;
        }
    }
}

