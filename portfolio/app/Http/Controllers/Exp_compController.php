<?php namespace App\Http\Controllers;

use App\Competences;
use App\Experiences;
use App\Experiences_competences;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Exp_compController extends Controller {

	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create($id)
	{
		$experiences = Experiences::find($id);
		$competences = Competences::all(['id','name']);
		$competences = $competences->toArray();
		$tab[] = 0;
		foreach($competences as $item){
			$tab[$item['id']] = $item['name'];
		}
		$tab[0] = "Choissiez";

		return view('experiences/exp_comp_create', compact('experiences', 'tab'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$exp_comp = Experiences_competences::create($request->all());
		Session::flash('create', 'Competences successfully added!');
		return redirect(route('experiences.index'));
	}

	/**
	 * Display the specified resource.
	 */
	public function show($id)
	{
		$experiences = Experiences::findOrFail($id);
		$query = DB::table('Experiences_competences AS ec ')
			->join('experiences AS e', 'e.id', '=' , 'ec.experiences_id')
			->join('competences AS c', 'c.id', '=' , 'ec.competences_id')
			->select('c.name AS comp_name','ec.id AS ec_id')
			->where('ec.experiences_id', '=' , $id)
			->groupBy('ec.id')
			->get();
		//dd($query);

		return view('experiences/exp_comp_show', compact('query', 'experiences'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		$exp_comp = Experiences_competences::findOrFail($id);
		$exp_comp->delete();
		Session::flash('create', 'Competences successfully deleted!');
		return redirect(route('experiences.index'));
	}

}
