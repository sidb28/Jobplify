<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Joblisting;
use Carbon\Carbon;

class JoblistingTableSeeder extends Seeder {

	public function run()
	{
		$recruiter1 = DB::table('recruiters')->select('id')->where('name','Ed Woodward')->first()->id;
		$recruiter2 = DB::table('recruiters')->select('id')->where('name','Jose Mourinho')->first()->id;
		$recruiter3 = DB::table('recruiters')->select('id')->where('name','Pep Guardiola')->first()->id;
		$recruiter4 = DB::table('recruiters')->select('id')->where('name','Jurgen Klopp')->first()->id;		

		Joblisting::create(array(
			'position' 		=> 'Sports Director',
			'location'		=> 'Old Trafford, Manchester', 
			'recruiter_id'	=> $recruiter1,
			'salary'		=> 100000,
			'no_of_vacancies' => 1,
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			));

		Joblisting::create(array(
			'position' 		=> 'Trophy Designer',
			'location'		=> 'White Hart Lane, London', 
			'recruiter_id'	=> $recruiter2,
			'salary'		=> 75000,
			'no_of_vacancies'=> 3,
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			));

		Joblisting::create(array(
			'position' 		=> 'Regional Manager',
			'location'		=> 'Etihad Stadium, Manchester', 
			'recruiter_id'	=> $recruiter3,
			'salary'		=> 400000,
			'no_of_vacancies'=> 2,
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			));

		Joblisting::create(array(
			'position' 		=> 'Private Security',
			'location'		=> 'Antfield, Liverpool', 
			'recruiter_id'	=> $recruiter4,
			'salary'		=> 35000,
			'no_of_vacancies'=> 6,
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			));
	}

}