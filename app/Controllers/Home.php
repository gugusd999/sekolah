<?php namespace App\Controllers;

class Home extends BaseController
{
	public function __construct(){
		helper('cookie');
	}

	public function index()
	{
		return view('welcome_message');
	}

	public function home()
	{
		$data = session();
		$data->name = 'hooki';
		echo view('admin/home');
	}

	//--------------------------------------------------------------------

}
