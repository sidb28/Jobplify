<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Recruiter extends Model
{
	protected $fillable = ['name', 'email', 'password', 'user_id'];

	public function user() {
		return $this->hasOne('App\User');
	}

    public function joblistings() {
    	return $this->hasMany('App\JobListing');
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
}
