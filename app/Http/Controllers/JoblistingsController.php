<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Recruiter;
use App\JobListing;
use Auth;

class JoblistingsController extends Controller
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
        //Retrieve all 'Joblisting' records
        $joblistings = JobListing::all();

        //return the joblistings.index view with $joblistings variable
        return view('joblistings.index')->with('joblistings', $joblistings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->is_recruiter == true || $user->is_admin == true) {
            //Retrieve all 'Recruiter' records with 'name' and 'id'
            //and store the records in the $recruiters variable
            $recruiters = Recruiter::lists('name', 'id');

            //return the 'joblistings.create' view with $recruiters variables
            return view('joblistings.create')->with('recruiters', $recruiters);
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
    public function store(Request $request)
    {
        //Retrieve user and recruiter record
        $user = Auth::user();
        $recruiter = Recruiter::find($request->get('recruiter_id'));

        //Create new Joblisting record
        $joblisting = new JobListing;

        //Assign position, location, salary and vacancies from inputs
        $joblisting->position = $request->get('position');
        $joblisting->location = $request->get('location');
        $joblisting->salary = $request->get('salary');
        $joblisting->no_of_vacancies = $request->get('no_of_vacancies');

        //Assign recruiter_id and user_id from their records
        $joblisting->recruiter()->associate($recruiter);
        // $joblisting->user()->associate($user);

        //Save record in Database
        $joblisting->save();

        //Redirect to joblistings.show function 
        return \Redirect::route('joblistings.show', array($joblisting->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //Retrieve Joblisting record
        $joblisting = JobListing::find($id);

        //return the joblistings.show view with $joblisting record
        return view('joblistings.show')->with('joblisting', $joblisting);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //Retrieve the $joblisting record using $id
        $joblisting = JobListing::find($id);

        if ($joblisting->recruiter->user_id == Auth::user()->id) {
            //Retrieve all $recruiters records with 'name' and 'id'
            $recruiters = Recruiter::lists('name', 'id');

            //Return the joblistings.edit view with the $joblisting and $recruiters records
            return view('joblistings.edit')->with(array('joblisting'=>$joblisting, 'recruiters'=>$recruiters));
        }
        else {
            return view('errors.illegalfunctioncall');
        }

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
        //Retrieve the $joblisting using $id
        $joblisting = JobListing::find($id);

        //Update $joblisting record with user input
        $joblisting->update($request->all());

        //Redirect to 'joblistings.show' view with the updated '$joblisting' record
        return \Redirect::route('joblistings.show', array($joblisting->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //Retrieve the '$joblisting' record using '$id'
        $joblisting = JobListing::find($id);

        if ($joblisting->recruiter->user_id == Auth::user()->id) {
            //Delete $joblisting from the database
            $joblisting -> delete();

            //Redirect to 'joblistings.index' view
            return \Redirect::route('joblistings.index');
        } 
        else {
            return view('errors.joblistingdelete');
        }
    }
}