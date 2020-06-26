<?php namespace App\Controllers;

class Peperino extends BaseController
{
	public function showLoginForm()
	{
		return view('auths/login');
	}
	
	public function showRegisterForm()
	{	
		return view('auths/register');
	}

}
