<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

class UserTableSeeder extends Seeder {

	public function run()
	{

		User::create(array(
			'name' 		=> 'Paul Pogba',
			'email'		=> 'paul@example.com',
			'password'	=> Hash::make('123456'),
			'is_admin'  => false,
			'is_recruiter' => false,
			'image' => 'uploads/user-images/noimage.png',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			));

		User::create(array(
			'name' 		=> 'Jesse Lingard',
			'email'		=> 'jesse@example.com',
			'password'	=> Hash::make('123456'),
			'is_admin'  => false,
			'is_recruiter' => false,
			'image' => 'uploads/user-images/noimage.png',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			));

		User::create(array(
			'name' 		=> 'David de Gea',
			'email'		=> 'dave@example.com',
			'password'	=> Hash::make('123456'),
			'is_admin'  => false,
			'is_recruiter' => false,
			'image' => 'uploads/user-images/noimage.png',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			));

		User::create(array(
			'name' 		=> 'Nemanja Matic',
			'email'		=> 'matic@example.com',
			'password'	=> Hash::make('123456'),
			'is_admin'  => false,
			'is_recruiter' => false,
			'image' => 'uploads/user-images/noimage.png',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			));

		User::create(array(
			'name' 		=> 'Ed Woodward',
			'email'		=> 'ed@example.com',
			'password'	=> Hash::make('123456'),
			'is_admin'  => false,
			'is_recruiter' => true,
			'image' => 'uploads/user-images/noimage.png',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			));

		User::create(array(
			'name' 		=> 'Jose Mourinho',
			'email'		=> 'mou@example.com',
			'password'	=> Hash::make('123456'),
			'is_admin'  => false,
			'is_recruiter' => true,
			'image' => 'uploads/user-images/noimage.png',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			));

		User::create(array(
			'name' 		=> 'Pep Guardiola',
			'email'		=> 'pep@example.com',
			'password'	=> Hash::make('123456'),
			'is_admin'  => false,
			'is_recruiter' => true,
			'image' => 'uploads/user-images/noimage.png',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			));

		User::create(array(
			'name' 		=> 'Jurgen Klopp',
			'email'		=> 'klopp@example.com',
			'password'	=> Hash::make('123456'),
			'is_admin'  => false,
			'is_recruiter' => true,
			'image' => 'uploads/user-images/noimage.png',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			));

		User::create(array(
			'name' 		=> 'Siddhant Bagri',
			'email'		=> 'siddhant@example.com',
			'password'	=> Hash::make('123456'),
			'is_admin'  => true,
			'is_recruiter' => false,
			'image' => 'uploads/user-images/noimage.png',
			'created_at'=> Carbon::now(),
			'updated_at'=> Carbon::now(),
			));
	}
}