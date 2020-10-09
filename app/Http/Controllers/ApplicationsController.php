<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\JobListing;
use App\Application;
use App\JobSeeker;
use App\User;
use Auth;
use DB;
use Mail;

class ApplicationsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // if (Auth::user()->is_admin == true) {
        //     //Retrieve all 'Application' records
        //     $applications = Application::all();

        //     //return the applications.index view with $applications variable
        //     return view('applications.index')->with('applications', $applications);    
        // } 
        // else {
        //     return \Redirect::route('home');
        // }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($Joblistingid)
    {
        $user = Auth::user();

        if($user->is_recruiter == false || $user->is_admin == true) {
            //Retrieve Joblisting record using $Joblistingid
            $joblisting = JobListing::find($Joblistingid);

            //Retrieve jobseeker record using $user->id
            $jobseeker = DB::table('job_seekers')->where('user_id', $user->id)->first();

            //return the applications.create view with $joblisting
            return view('applications.create') -> 
                with(array('joblisting'=>$joblisting, 'user'=>$user));
        }
        else {
            return view('errors.illegalfunctioncall');
        }
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, $Joblistingid)
    {
        //Retrieve Joblisting record using $Joblistingid
        $joblisting = JobListing::find($Joblistingid);

        $user = Auth::user();

        //Retrieve jobseeker record using $user->id
        $jobseeker = DB::table('job_seekers')->where('user_id', $user->id)->first();

        //Create new Application record
        $application = new Application;

        //Assign input values to new Application record
        // application->joblisting_id = \Input::get('joblisting_id');
        $application->jobseeker_id = $jobseeker->id;
        $application->essay = \Input::get('essay');
        $application->status = \Input::get('status');
        $application->salary_offered = \Input::get('salary_offered');
        
        $destinationPath = 'uploads/cvs/';

        if (\Input::hasFile('cv')) {
            //assign file to $cv
            $cv = \Input::file('cv');
            //assign cv's filename to random character + original name 
            $filename = str_random(20) . $cv->getClientOriginalName();
            // move cv to destination path, and rename cv with $filename 
            $cv->move($destinationPath, $filename);
            //set $path to be $destination + $filename
            $path = $destinationPath . $filename; 
        }
        else {
            //set $path to noimage
            $path = $destinationPath . 'nocv.pdf';
        }

        $application->cv = $path;

        //Associate Application with $joblisting to assign joblisting_id
        $application->joblisting()->associate($joblisting);

        //Save the new application record
        $application->save();

        //Redirect to joblistings.<joblisting_id>.applications.show
        return \Redirect::route('applicationSuccess', array($application->number));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // //Retrieve the '$application' record using '$id'
        // $application = Application::find($id);

        // //Delete $application from the database
        // $application -> delete();

        // //Redirect to 'application.all' view
        // return \Redirect::route('applications.all');
    }

    public function allApplications()
    {
        //Retrieve user record from Auth API 
        $user = Auth::user();

        if($user->is_admin == true)
        {
            $applications = Application::paginate(5);

            return view('applications.applicationsAdmin')->with('applications', $applications);
        }
        elseif ($user->is_recruiter == true) 
        {
            $recruiter = DB::table('recruiters')->where('user_id', $user->id)->first();

            //retrieve current recruiter's Application records by joining "applications" with "job_listings" table 
            $applications = Application::join('job_listings', 'job_listings.id', '=', 'applications.joblisting_id')
                //filter for the current recruiter 
                ->where('recruiter_id', '=', $recruiter->id)
                //select only 4 attributes
                ->select('applications.id as application_id', 'essay', 'status', 'salary_offered')
                //display 3 records per page with pagination 
                ->paginate(3);

            //return the 'applications.applications' view with $applications
            return view('applications.applicationsRecruiter')->with('applications', $applications);
        } 
        else 
        {
            $jobseeker = DB::table('job_seekers')->where('user_id', $user->id)->first();

            //retrieve current user's Application records by joining "applications" with "job_seekers" table 
            $applications = Application::join('job_seekers','job_seekers.id','=','applications.jobseeker_id')
                //filter for the current user 
                ->where('jobseeker_id','=',$jobseeker->id)
                //select only 4 attributes
                ->select('applications.id as application_id', 'essay', 'status', 'salary_offered')
                //display 3 records per page with pagination 
                ->paginate(3);    

            //return the 'applications.applications' view with $applications
            return view('applications.applicationsJobseeker')->with('applications', $applications);
        }
    }

    public function success()
    {
        return view('applications.success');
    }

    public function shortlist($Applicationid) {
        $user = Auth::user();

        if($user->is_recruiter == true) {
            $application = Application::find($Applicationid);

            $applicant = $application->jobseeker;

            // send email to $applicant
            $data = array('name'=>$applicant->name);

            Mail::send(['text'=>'emails.update'], $data, function($message) use ($applicant) 
            {
                $message->from('jobplify@yahoo.com','Jobplify');
                
                $message->to($applicant->email, $applicant->name)->subject('Application Status Update on Jobplify: You have been shortlisted for an Interview!');
            });
            echo "Email Successfully Sent to Job Seeker!";

            $application->status = 'Shortlisted';

            $application->save();

            return \Redirect::route('applications.all');
        }
        else {
            return view('errors.illegalfunctioncall');
        }
    }

    public function reject($Applicationid) {
        $user = Auth::user();

        if($user->is_recruiter == true) {
            $application = Application::find($Applicationid);

            $applicant = $application->jobseeker;

            // send email to $applicant
            $data = array('name'=>$applicant->name);

            Mail::send(['text'=>'emails.update'], $data, function($message) use ($applicant) 
            {
                $message->from('jobplify@yahoo.com','Jobplify');
                
                $message->to($applicant->email, $applicant->name)->subject('Application Status Update on Jobplify: An application has been rejected.');
            });
            echo "Email Successfully Sent to Job Seeker!";

            $application->status = 'Rejected';

            $application->save();

            return \Redirect::route('applications.all');
        }
        else {
            return view('errors.illegalfunctioncall');
        }
    }

    public function sendOffer($Applicationid) {
        $user = Auth::user();

        if($user->is_recruiter == true) {
            $application = Application::find($Applicationid);

            $applicant = $application->jobseeker;

            // send email to $applicant
            $data = array('name'=>$applicant->name);

            Mail::send(['text'=>'emails.update'], $data, function($message) use ($applicant) 
            {
                $message->from('jobplify@yahoo.com','Jobplify');
                
                $message->to($applicant->email, $applicant->name)->subject('Application Status Update on Jobplify: You have received an offer!');
            });
            echo "Email Successfully Sent to Job Seeker!";

            $application->status = 'Offer Sent';
            $application->salary_offered = $application->joblisting->salary;

            $application->save();

            return \Redirect::route('applications.all');
        }
        else {
            return view('errors.illegalfunctioncall');
        }
    }

    public function offers() {
        //Retrieve user record from Auth API 
        $user = Auth::user();

        if($user->is_admin == true) {
            $offers = Application::join('job_listings', 'job_listings.id', '=', 'applications.joblisting_id')
                // join job_seekers and recruiters table to get their details
                ->join('job_seekers','job_seekers.id','=','applications.jobseeker_id')
                ->join('recruiters', 'recruiters.id', '=', 'job_listings.recruiter_id')
                //filter for offers sent
                ->where('salary_offered', '>', 0)
                //select only 4 attributes
                ->select('applications.id as application_id', 'salary_offered', 'job_listings.position as position', 'recruiters.name as recruiter_name', 'job_seekers.name as applicant_name', 'recruiters.company_name as company', 'applications.status as status')
                //display 3 records per page with pagination 
                ->paginate(3);
        }
        elseif ($user->is_recruiter == true) {
            $recruiter = DB::table('recruiters')->where('user_id', $user->id)->first();

            $offers = Application::join('job_listings', 'job_listings.id', '=', 'applications.joblisting_id')
                // join job_seekers and recruiters table to get their details
                ->join('job_seekers','job_seekers.id','=','applications.jobseeker_id')
                ->join('recruiters', 'recruiters.id', '=', 'job_listings.recruiter_id')
                //filter for the current recruiter 
                ->where('job_listings.recruiter_id', '=', $recruiter->id)
                //filter for offers sent
                ->where('salary_offered', '>', 0)
                //select only 4 attributes
                ->select('applications.id as application_id', 'salary_offered', 'job_listings.position as position', 'recruiters.name as recruiter_name', 'job_seekers.name as applicant_name', 'recruiters.company_name as company', 'applications.status as status')
                //display 3 records per page with pagination 
                ->paginate(3);
        }
        else {
            $jobseeker = DB::table('job_seekers')->where('user_id', $user->id)->first();

            $offers = Application::join('job_listings', 'job_listings.id', '=', 'applications.joblisting_id')
                ->join('job_seekers','job_seekers.id','=','applications.jobseeker_id')
                ->join('recruiters', 'recruiters.id', '=', 'job_listings.recruiter_id')
                ->where('jobseeker_id', '=', $jobseeker->id)
                ->where('salary_offered', '>', 0)
                ->select('applications.id as application_id', 'salary_offered', 'job_listings.position as position','recruiters.name as recruiter_name', 'job_seekers.name as applicant_name', 'recruiters.company_name as company', 'applications.status as status')
                ->paginate(3);
        }
        return view('applications.offers')->with('offers', $offers); 
    }

    public function acceptOffer($Applicationid) {
        $user = Auth::user();

        if($user->is_recruiter == false) {
            $application = Application::find($Applicationid);

            $applicant = $application->jobseeker;

            // send email to $applicant
            $data = array('name'=>$applicant->name);

            Mail::send(['text'=>'emails.update'], $data, function($message) use ($applicant) 
            {
                $message->from('jobplify@yahoo.com','Jobplify');
                
                $message->to($applicant->email, $applicant->name)->subject('Application Status Update on Jobplify: You have accepted an offer!');
            });
            echo "Email Successfully Sent to Job Seeker!";

            $application->status = 'Offer Accepted';

            $application->save();

            return \Redirect::route('applications.offers');
        }
        else {
            return view('errors.illegalfunctioncall');
        }
    }

    public function declineOffer($Applicationid) {
        $user = Auth::user();

        if($user->is_recruiter == false) {
            $application = Application::find($Applicationid);

            $applicant = $application->jobseeker;

            // send email to $applicant
            $data = array('name'=>$applicant->name);

            Mail::send(['text'=>'emails.update'], $data, function($message) use ($applicant) 
            {
                $message->from('jobplify@yahoo.com','Jobplify');
                
                $message->to($applicant->email, $applicant->name)->subject('Application Status Update on Jobplify: You have declined an offer!');
            });
            echo "Email Successfully Sent to Job Seeker!";

            $application->status = 'Offer Declined';

            $application->save();

            return \Redirect::route('applications.offers');
        }
        else {
            return view('errors.illegalfunctioncall');
        }
    }

    public function viewCV($Applicationid) {
        $application = Application::find($Applicationid);

        $name = $application->jobseeker->name . "_CV";

        return response()->download($application->cv, $name);
    }
}