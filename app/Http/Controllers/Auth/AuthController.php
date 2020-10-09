<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\JobSeeker;
use App\Recruiter;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $destinationPath = 'uploads/user-images/';
        if (\Input::hasFile('image')) 
        {
            //assign file to $image
            $image = \Input::file('image');

            //assign image's filename to random character + original name
            $filename = str_random(20) . $image->getClientOriginalName();

            //move image to destination path, and rename image with $filename
            $image->move($destinationPath, $filename);

            //set $path to be $destination + $filename
            $path = $destinationPath . $filename;
        }    
        else
        {
            //set $path to noimage
            $path = $destinationPath . 'noimage.png';
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'is_recruiter' => $data['is_recruiter'],

            //assign $path to 'image' attribute
            'image' => $path,
        ]);

        $userId = $user->id;
        $is_recruiter = $user->is_recruiter;
        $password = $user->password;

        //Create a record in the corresponding table after user creation
        if ($is_recruiter == 1) {
            Recruiter::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $password,
                'user_id' => $userId,
            ]);
        }
        else {
            JobSeeker::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $password,
                'user_id' => $userId,
            ]);
        }

        return $user;
    }
}
