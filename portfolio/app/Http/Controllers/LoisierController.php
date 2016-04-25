<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\LoisierRequest;
use App\Loisier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LoisierController extends Controller {

	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$loisier = Loisier::all();
		return view('loisier/index', compact('loisier'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('loisier/create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(LoisierRequest $request)
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
			$destinationPath = public_path().'/uploads/loisiers';
//          Déplacer le fichier
			$image->move($destinationPath, $fileName);
		}
		$loisier = Loisier::create($request->all());
		$loisier->image = asset('/uploads/loisiers/'.$fileName);
		$loisier->save();

		Session::flash('create', 'Loisier successfully added!');

		return redirect(route('loisier.index'));
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
		$loisier = Loisier::findOrfail($id);
		return view('loisier/edit', compact('loisier','id'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update($id, LoisierRequest $request)
	{
		$loisier = Loisier::findOrFail($id);
		$loisier->update($request->only('description'));

		//  upload image
		$file = $request->input('image');
		if(!empty( $file)){

			$filename = basename($loisier->image);
			$filename = public_path().'/uploads/loisiers/'.$filename;
			File::delete($filename);
			$image = Input::file('image');

			if(Input::hasFile('image')){
				//Récupere le non d'origine de fichier
				$fileName  = $image->getClientOriginalName();
				//récupere l'extension de l'image ex: (png|jpg|jpeg)
				$extension = $image->getClientOriginalExtension();
				//renameing image
				$fileName  = rand(11111,99999).'.'.$extension;
				//indique ou stocke le fichier
				$destinationPath = public_path().'/uploads/loisiers';
				//Déplacer le fichier
				$image->move($destinationPath, $fileName);
			}
			$loisier->image = asset('/uploads/loisiers/'.$fileName);
			$loisier->update();
		}

		Session::flash('update', 'Loisier successfully updated!');

		return redirect(route('loisier.edit', $id));
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		$loisier = Loisier::findOrFail($id);
		$loisier->delete();
		Session::flash('delete', 'Loisiers successfully deleted!');
		return redirect(route(('loisier.index')));
	}

}
