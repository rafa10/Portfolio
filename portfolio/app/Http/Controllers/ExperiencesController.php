<?php namespace App\Http\Controllers;

use App\Experiences;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ExperiencesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ExperiencesController extends Controller {

	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$experiences = Experiences::all();
		return view('experiences/index', compact('experiences'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view ('experiences/create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(ExperiencesRequest $request)
	{

//      uploade image
		$image = Input::file('image');
		if(Input::hasFile('image')){
//          Récupere le non d'origine de fichier
			$fileName = $image->getClientOriginalName();
//          récupere l'extension de l'image ex: (png|jpg|jpeg)
			$extension = $image->getClientOriginalExtension();
//          renameing image
			$fileName = rand(11111,99999).'.'.$extension;
//          Indique ou stocke le fichier
			$destinationPath = public_path().'/uploads/experiences';
//          Déplacer le fichier
			$image->move($destinationPath, $fileName);
		}
		$experiences = Experiences::create($request->all());
		$experiences->image = asset('/uploads/experiences/'.$fileName);
		$experiences->save();

		Session::flash('create', 'Experiences successfully added!');

		return redirect(route('experiences.index'));
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
		$experiences = Experiences::findOrFail($id);
		return view ('experiences/edit', compact('experiences','id'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update($id, ExperiencesRequest $request)
	{
		$experiences = Experiences::findOrFail($id);
		$experiences->update($request->only('fonction', 'date_start', 'date_end', 'business', 'description', 'url'));

//  	upload image
		$file = $request->input('image');
		if(!empty( $file)){

			$filename = basename($experiences->image);
			$filename = public_path().'/uploads/experiences/'.$filename;
			File::delete($filename);
			$image = Input::file('image');

			if(Input::hasFile('image')){
//          Récupere le non d'origine de fichier
				$fileName = $image->getClientOriginalName();
//          récupere l'extension de l'image ex: (png|jpg|jpeg)
				$extension = $image->getClientOriginalExtension();
//          renameing image
				$fileName = rand(11111,99999).'.'.$extension;
//          Indique ou stocke le fichier
				$destinationPath = public_path().'/uploads/experiences';
//          Déplacer le fichier
				$image->move($destinationPath, $fileName);
			}
			$experiences->image = asset('/uploads/experiences/'.$fileName);
			$experiences->update();
		}

		Session::flash('update', 'Competences successfully updated!');

		return redirect(route('experiences.edit', $id));
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		$experiences = Experiences::findOrFail($id);
		$experiences->delete();
		Session::flash('delete','Experiences successfully deleted!');
		return redirect(route('experiences.index'));
	}

}
