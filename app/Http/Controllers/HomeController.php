<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        // $latest_joblisting = DB::table('job_listings') -> latest() -> first() -> get('id');
        $user = Auth::user();

        return view('home')->with('user', $user);;
    }

    public function contact() 
    {
        $user = Auth::user();

        return view('contact')->with('user', $user);
    }
    
}
