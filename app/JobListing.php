<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JobListing extends Model
{
	protected $fillable = ['position', 'location', 'salary', 'no_of_vacancies'];
	
    public function applications() {
    	return $this->hasMany('App\Application');
    }

    public function recruiter() {
    	return $this->belongsTo('App\Recruiter');
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
