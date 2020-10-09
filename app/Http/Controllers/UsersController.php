<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;

class UsersController extends Controller
{
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
    public function create()
    {
        // Register new user
        return \Redirect::route('getRegister');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //Retrieve current user record in $user
        $user = Auth::user();    

        return view('users.showprofile')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //Retrieve current user record in $user
        $user = Auth::user();

        return view('users.editprofile')->with('user', $user);
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
        //Retrieve current user record in $user
        $user = Auth::user();

        //Update $user record with user input
        $user->update($request->all());

        return \Redirect::route('users.show', array($user->id));
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
        $user = User::find($id);

        //Delete $joblisting from the database
        $user -> delete();

        //Redirect to 'joblistings.index' view
        return \Redirect::route('getRegister');
    }
}
