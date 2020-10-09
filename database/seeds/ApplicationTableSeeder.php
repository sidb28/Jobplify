<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Application;
use Carbon\Carbon;

class ApplicationTableSeeder extends Seeder {

	public function run()
	{
		$jobseeker1 = DB::table('job_seekers')->select('id')->where('name','Paul Pogba')->first()->id;
		$jobseeker2 = DB::table('job_seekers')->select('id')->where('name','Jesse Lingard')->first()->id;
		$jobseeker3 = DB::table('job_seekers')->select('id')->where('name','David de Gea')->first()->id;
		$jobseeker4 = DB::table('job_seekers')->select('id')->where('name','Nemanja Matic')->first()->id;
		
		$joblisting1 = DB::table('job_listings')->select('id')->where('position','Sports Director')->first()->id;
		$joblisting2 = DB::table('job_listings')->select('id')->where('position','Trophy Designer')->first()->id;
		$joblisting3 = DB::table('job_listings')->select('id')->where('position','Regional Manager')->first()->id;
		$joblisting4 = DB::table('job_listings')->select('id')->where('position','Private Security')->first()->id;
	
		Application::create(array(
			'jobseeker_id' 	=> $jobseeker1,
			'joblisting_id'	=> $joblisting1,
			'essay'			=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut sapien ut nisl venenatis aliquam. Etiam vel urna aliquam nibh hendrerit ultricies non at est. Vestibulum vel finibus massa, ut rhoncus ipsum. Nulla a sollicitudin mi. Aliquam felis nunc, faucibus luctus varius quis, efficitur sed nisl.',
			'status' 		=> 'Applied',
			'salary_offered'=> 0,
			'cv'	=> 'uploads/cvs/nocv.pdf',
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			));

		Application::create(array(
			'jobseeker_id' 	=> $jobseeker2,
			'joblisting_id'	=> $joblisting2,
			'essay'			=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut sapien ut nisl venenatis aliquam. Etiam vel urna aliquam nibh hendrerit ultricies non at est. Vestibulum vel finibus massa, ut rhoncus ipsum. Nulla a sollicitudin mi. Aliquam felis nunc, faucibus luctus varius quis, efficitur sed nisl.',
			'status' 		=> 'Shortlisted',
			'salary_offered'=> 0,
			'cv'	=> 'uploads/cvs/nocv.pdf',
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			));

		Application::create(array(
			'jobseeker_id' 	=> $jobseeker3,
			'joblisting_id'	=> $joblisting3,
			'essay'			=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut sapien ut nisl venenatis aliquam. Etiam vel urna aliquam nibh hendrerit ultricies non at est. Vestibulum vel finibus massa, ut rhoncus ipsum. Nulla a sollicitudin mi. Aliquam felis nunc, faucibus luctus varius quis, efficitur sed nisl.',
			'status' 		=> 'Offer Sent',
			'salary_offered'=> 400000,
			'cv'	=> 'uploads/cvs/nocv.pdf',
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			));

		Application::create(array(
			'jobseeker_id' 	=> $jobseeker4,
			'joblisting_id'	=> $joblisting4,
			'essay'			=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut sapien ut nisl venenatis aliquam. Etiam vel urna aliquam nibh hendrerit ultricies non at est. Vestibulum vel finibus massa, ut rhoncus ipsum. Nulla a sollicitudin mi. Aliquam felis nunc, faucibus luctus varius quis, efficitur sed nisl.',
			'status' 		=> 'Applied',
			'salary_offered'=> 0,
			'cv'	=> 'uploads/cvs/nocv.pdf',
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			));


		Application::create(array(
			'jobseeker_id' 	=> $jobseeker1,
			'joblisting_id'	=> $joblisting2,
			'essay'			=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut sapien ut nisl venenatis aliquam. Etiam vel urna aliquam nibh hendrerit ultricies non at est. Vestibulum vel finibus massa, ut rhoncus ipsum. Nulla a sollicitudin mi. Aliquam felis nunc, faucibus luctus varius quis, efficitur sed nisl.',
			'status' 		=> 'Interview Scheduled',
			'salary_offered'=> 0,
			'cv'	=> 'uploads/cvs/nocv.pdf',
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			));

		Application::create(array(
			'jobseeker_id' 	=> $jobseeker2,
			'joblisting_id'	=> $joblisting4,
			'essay'			=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut sapien ut nisl venenatis aliquam. Etiam vel urna aliquam nibh hendrerit ultricies non at est. Vestibulum vel finibus massa, ut rhoncus ipsum. Nulla a sollicitudin mi. Aliquam felis nunc, faucibus luctus varius quis, efficitur sed nisl.',
			'status' 		=> 'Offer Accepted',
			'salary_offered'=> 35000,
			'cv'	=> 'uploads/cvs/nocv.pdf',
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			));

		Application::create(array(
			'jobseeker_id' 	=> $jobseeker3,
			'joblisting_id'	=> $joblisting2,
			'essay'			=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut sapien ut nisl venenatis aliquam. Etiam vel urna aliquam nibh hendrerit ultricies non at est. Vestibulum vel finibus massa, ut rhoncus ipsum. Nulla a sollicitudin mi. Aliquam felis nunc, faucibus luctus varius quis, efficitur sed nisl.',
			'status' 		=> 'Offer Declined',
			'salary_offered'=> 75000,
			'cv'	=> 'uploads/cvs/nocv.pdf',
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			));

		Application::create(array(
			'jobseeker_id' 	=> $jobseeker4,
			'joblisting_id'	=> $joblisting3,
			'essay'			=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut sapien ut nisl venenatis aliquam. Etiam vel urna aliquam nibh hendrerit ultricies non at est. Vestibulum vel finibus massa, ut rhoncus ipsum. Nulla a sollicitudin mi. Aliquam felis nunc, faucibus luctus varius quis, efficitur sed nisl.',
			'status' 		=> 'Offer Sent',
			'salary_offered'=> 400000,
			'cv'	=> 'uploads/cvs/nocv.pdf',
			'created_at'	=> Carbon::now(),
			'updated_at'	=> Carbon::now(),
			));
	}

}