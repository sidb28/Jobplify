<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
	protected $fillable = ['name', 'email', 'password', 'user_id'];

	public function user() {
		return $this->hasOne('App\User');
	}
	
    public function applications() {
    	return $this->hasMany('App\Application');
    }
}
