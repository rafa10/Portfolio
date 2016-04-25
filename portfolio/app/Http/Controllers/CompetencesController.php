<?php namespace App\Http\Controllers;

use App\Competences;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CompetencesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CompetencesController extends Controller {


	/*public function __construct()
	{
		$this->middleware('auth');
	}*/

	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$competences = Competences::all();
		return view('competences/index', compact('competences'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('competences/create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(CompetencesRequest $request)
	{

//      uploade image
		$logo = Input::file('logo');
		if(Input::hasFile('logo')){
//          Récupere le non d'origine de fichier
			$fileName = $logo->getClientOriginalName();
//          récupere l'extension de l'image ex: (png|jpg|jpeg)
			$extension = $logo->getClientOriginalExtension();
//          renameing image
			$fileName = rand(11111,99999).'.'.$extension;
//          Indique ou stocke le fichier
			$destinationPath = public_path().'/uploads/competences';
//          Déplacer le fichier
			$logo->move($destinationPath, $fileName);
		}
		$competences = Competences::create($request->all());
		$competences->logo = asset('/uploads/competences/'.$fileName);
		$competences->save();

		Session::flash('create', 'Competences successfully added!');

		return redirect(route('competences.index'));
	}

	/**
	 * Display the specified resource.
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id)
	{
		$competences = Competences::find($id);

		return view('competences/edit', compact('competences','id'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update($id, Request $request)
	{
		$competences = Competences::findOrFail($id);
		$competences->update($request->only('name', 'rating'));

		//  upload image
		$file = $request->input('logo');
		if(!empty( $file)){

			$filename = basename($competences->logo);
			$filename = public_path().'/uploads/competences/'.$filename;
			File::delete($filename);
			$logo = Input::file('logo');

			if(Input::hasFile('logo')){
//          Récupere le non d'origine de fichier
				$fileName = $logo->getClientOriginalName();
//          récupere l'extension de l'image ex: (png|jpg|jpeg)
				$extension = $logo->getClientOriginalExtension();
//          renameing image
				$fileName = rand(11111,99999).'.'.$extension;
//          Indique ou stocke le fichier
				$destinationPath = public_path().'/uploads/competences';
//          Déplacer le fichier
				$logo->move($destinationPath, $fileName);
			}
			$competences->logo = asset('/uploads/competences/'.$fileName);
			$competences->update();
		}

		Session::flash('update', 'Competences successfully updated!');

		return redirect(route('competences.edit', $id));
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		$competences = Competences::findOrFail($id);
		$competences->delete();
		Session::flash('delete', 'Competences successfully deleted!');
		return redirect(route(('competences.index')));
	}

}
