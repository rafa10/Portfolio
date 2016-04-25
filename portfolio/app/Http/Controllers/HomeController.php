<?php namespace App\Http\Controllers;

use App\Competences;
use App\Experiences;
use App\Formation;
use App\Http\Requests\ContactRequest;
use App\Langue;
use App\Loisier;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {




	/**
	 * Show the application home page.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = User::find(1);
		$competences = Competences::all();
		//$experiences = Experiences::all();
		$experiences = DB::table('Experiences_competences AS ec ')
			->join('experiences AS e', 'e.id', '=', 'ec.experiences_id')
			->join('competences AS c', 'c.id', '=', 'ec.competences_id')
			->select('e.*', 'ec.*', 'c.name As camp_name')
			->groupby('e.id')
			->get();
		$formation = Formation::all();
		$langue = Langue::all();
		$loisier = Loisier::all();

		return view('home', compact(
			'competences',
			'experiences',
			'formation',
			'langue',
			'loisier',
			'user'
		));
		}

		/**
		 * Action send mail with form contact
		 * @param ContactRequest $request
		 * @return mixed
		 */
		public function sendMail(ContactRequest $request)
			{
				$contact  = $request->all();
			//        dd($contact['name']);
				Mail::send('emails/contact', ['contact' => $contact], function ($message) use ($contact) {
					$message->from($contact['email'], 'laracinema');
					$message->to('laracinema@app.com', 'admin')->subject($contact['subject']);
				});
				Session::flash('mail', 'Your mail successfully sended');
				return Redirect::route('contact.email');
			}





}
