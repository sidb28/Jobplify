<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();
        $this->call('UserTableSeeder');        

        DB::table('job_seekers')->delete();
        $this->call('JobseekerTableSeeder');

        DB::table('recruiters')->delete();
        $this->call('RecruiterTableSeeder');  

        DB::table('job_listings')->delete();
        $this->call('JoblistingTableSeeder'); 

        DB::table('applications')->delete();
        $this->call('ApplicationTableSeeder');

        DB::table('interviews')->delete();
        $this->call('InterviewTableSeeder');     

        Model::reguard();
    }

}
