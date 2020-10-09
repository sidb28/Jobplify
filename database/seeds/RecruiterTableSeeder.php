<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Recruiter;
use Carbon\Carbon;

class RecruiterTableSeeder extends Seeder {

	public function run()
	{
		$user1 = DB::table('users')->select('id')->where('name','Ed Woodward')->first()->id;
		$user2 = DB::table('users')->select('id')->where('name','Jose Mourinho')->first()->id;
		$user3 = DB::table('users')->select('id')->where('name','Pep Guardiola')->first()->id;
		$user4 = DB::table('users')->select('id')->where('name','Jurgen Klopp')->first()->id;

		Recruiter::create(array(
			'name' 		=> 'Ed Woodward',
			'email'		=> 'ed@example.com',
			'password'	=> Hash::make('123456'),
			'company_name' => 'Manchester United F.C.',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			'user_id'	=> $user1,
			));

		Recruiter::create(array(
			'name' 		=> 'Jose Mourinho',
			'email'		=> 'mou@example.com',
			'password'	=> Hash::make('123456'),
			'company_name' => 'Tottenham Hotspur F.C.',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			'user_id'	=> $user2,
			));

		Recruiter::create(array(
			'name' 		=> 'Pep Guardiola',
			'email'		=> 'pep@example.com',
			'password'	=> Hash::make('123456'),
			'company_name' => 'Manchester City F.C.',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			'user_id'	=> $user3,
			));

		Recruiter::create(array(
			'name' 		=> 'Jurgen Klopp',
			'email'		=> 'klopp@example.com',
			'password'	=> Hash::make('123456'),
			'company_name' => 'Liverpool F.C.',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			'user_id'	=> $user4,
			));
	}
}