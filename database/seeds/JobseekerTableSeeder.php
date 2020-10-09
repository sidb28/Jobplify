<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\JobSeeker;
use Carbon\Carbon;

class JobseekerTableSeeder extends Seeder {

	public function run()
	{
		$user1 = DB::table('users')->select('id')->where('name','Paul Pogba')->first()->id;
		$user2 = DB::table('users')->select('id')->where('name','Jesse Lingard')->first()->id;
		$user3 = DB::table('users')->select('id')->where('name','David de Gea')->first()->id;
		$user4 = DB::table('users')->select('id')->where('name','Nemanja Matic')->first()->id;
		
		Jobseeker::create(array(
			'name' 		=> 'Paul Pogba',
			'email'		=> 'paul@example.com',
			'password'	=> Hash::make('123456'),
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			'user_id'	=> $user1,
			));

		Jobseeker::create(array(
			'name' 		=> 'Jesse Lingard',
			'email'		=> 'jesse@example.com',
			'password'	=> Hash::make('123456'),
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			'user_id'	=> $user2,
			));

		Jobseeker::create(array(
			'name' 		=> 'David de Gea',
			'email'		=> 'dave@example.com',
			'password'	=> Hash::make('123456'),
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			'user_id'	=> $user3,
			));

		Jobseeker::create(array(
			'name' 		=> 'Nemanja Matic',
			'email'		=> 'matic@example.com',
			'password'	=> Hash::make('123456'),
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			'user_id'	=> $user4,
			));
	}
}