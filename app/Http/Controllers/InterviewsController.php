<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Application;
use App\Interview;
Use Auth;
use DB;

class InterviewsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth'); 
    }

    public function allInterviews()
    {
        //Retrieve user record from Auth API 
        $user = Auth::user();
        if($user->is_admin == true)
        {
            $interviews = Interview::paginate(5);

            return view('interviews.interviewsAdmin')->with('interviews', $interviews);
        }
        elseif ($user->is_recruiter == true || $user->is_admin == true) {
            $recruiter = DB::table('recruiters')->where('user_id', $user->id)->first();

            //Retrieve all interviews for current recruiter by joining Interviews table with Applications and Job Listings table
            $interviews = Interview::join('applications', 'applications.id', '=', 'interviews.application_id')
                ->join('job_listings', 'job_listings.id', '=', 'applications.joblisting_id')
                ->join('job_seekers','job_seekers.id','=','applications.jobseeker_id')
                ->where('recruiter_id', '=', $recruiter->id)
                ->select('interviews.id as interview_id', 'location_or_link', 'datetime', 'job_listings.position as position', 'job_seekers.name as name')
                ->paginate(3);

            return view('interviews.interviewsRecruiter')->with('interviews', $interviews);
        }
        else {
            $jobseeker = DB::table('job_seekers')->where('user_id', $user->id)->first();

            //Retrieve all interviews for current jobseeker by joining Interviews table with Applications and Job Seekers table
            $interviews = Interview::join('applications', 'applications.id', '=', 'interviews.application_id')
                ->join('job_listings', 'job_listings.id', '=', 'applications.joblisting_id')
                ->where('jobseeker_id', '=', $jobseeker->id)
                ->select('interviews.id as interview_id', 'location_or_link', 'datetime', 'job_listings.position as position')
                ->paginate(3);

            return view('interviews.interviewsJobseeker')->with(array('interviews'=>$interviews, 'user'=>$user));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($Applicationid)
    {
        $user = Auth::user();

        if ($user->is_recruiter == true || $user->is_admin == true) {
            $application = Application::find($Applicationid);

            $jobseeker = $application->jobseeker;

            $recruiter = DB::table('recruiters')->where('user_id', $user->id)->first();

            return view('interviews.create')->with(array('application'=>$application, 'user'=>$user, 'recruiter'=>$recruiter, 'jobseeker'=>$jobseeker));    
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
    public function store(Request $request, $Applicationid)
    {
        $application = Application::find($Applicationid);
        
        $interview = new Interview;

        $interview->application_id = $application->id;
        $interview->location_or_link = \Input::get('location_or_link');
        $interview->datetime = \Input::get('datetime');

        $interview->application()->associate($application);
        $interview->save();

        $application->status = 'Interview Scheduled';
        $application->save();

        return \Redirect::route('applications.all');
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
        //
    }
}
