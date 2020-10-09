<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['essay', 'cv'];

    public function interviews() {
    	return $this->hasMany('App\Interview');
    }

    public function jobseeker() {
    	return $this->belongsTo('App\JobSeeker');
    }

    public function joblisting() {
    	return $this->belongsTo('App\JobListing');
    }
}
