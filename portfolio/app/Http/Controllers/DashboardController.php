<?php namespace App\Http\Controllers;

use App\Competences;
use App\Experiences;
use App\Formation;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Langue;
use App\Loisier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for user that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	/**
	 * Create a new controller instance.
	 */

	public function __construct()
	{
		$this->middleware('auth');
	}


	public function dashboard()
	{
		$user = Auth::user();
		$competences = Competences::all();
		$experiences = Experiences::all();
		$formation = Formation::all();
		$langue = Langue::all();
		$loisier = Loisier::all();

		return view	('dashboard', compact(
			'competences',
			'experiences',
			'formation',
			'langue',
			'loisier',
			'user'
		));
	}

}
