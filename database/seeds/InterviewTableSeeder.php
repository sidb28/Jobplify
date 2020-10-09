<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Interview;
use Carbon\Carbon;

class InterviewTableSeeder extends Seeder {

	public function run()
	{
		$application1 = DB::table('applications')->select('id')->where('id','3')->first()->id;
		$application2 = DB::table('applications')->select('id')->where('id','5')->first()->id;
		$application3 = DB::table('applications')->select('id')->where('id','6')->first()->id;
		$application4 = DB::table('applications')->select('id')->where('id','7')->first()->id;
		$application5 = DB::table('applications')->select('id')->where('id','8')->first()->id;
		
		Interview::create(array(
			'location_or_link'	=> 'examplelink.com', 
			'application_id'=> $application1,
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			'datetime'		=> Carbon::create('2020', '05', '31', '14', '00', '00'),
			));

		Interview::create(array(
			'location_or_link'	=> 'Tottenham Hotspur Stadium', 
			'application_id'=> $application2,
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			'datetime'		=> Carbon::create('2020', '06', '02', '12', '00', '00'),
			));

		Interview::create(array(
			'location_or_link'	=> 'Merseyside, Liverpool', 
			'application_id'=> $application3,
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			'datetime'		=> Carbon::create('2020', '04', '15', '15', '30', '00'),
			));

		Interview::create(array(
			'location_or_link'	=> 'zoomLink@example.com', 
			'application_id'=> $application4,
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			'datetime'		=> Carbon::create('2020', '05', '01', '12', '00', '00'),
			));

		Interview::create(array(
			'location_or_link'	=> 'Hotel Ibis near Etihad Stadium, Manchester', 
			'application_id'=> $application5,
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			'datetime'		=> Carbon::create('2020', '04', '30', '16', '30', '00'),
			));
	}
}