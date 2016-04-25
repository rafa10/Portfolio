<?php namespace App\Http\Controllers;

use App\Formation;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\FormationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FormationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$formation = Formation::all();

		return view('formation/index', compact('formation'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return  view('formation/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(FormationRequest $request)
	{
		$formation = Formation::create($request->all());
		Session::flash('create', 'Formation successfully added!');
		return redirect(route('formation.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$formation = Formation::findOrFail($id);
		return view('formation/edit', compact('formation','id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, FormationRequest $request)
	{
		$formation = Formation::findOrFail($id);
		$formation->update($request->all());
		Session::flash('update', 'Formation successfully updated!');
		return redirect(route('formation.edit', $id));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$formation = Formation::findOrFail($id);
		$formation->delete();
		Session::flash('delete', 'Formation successfully deleted! ');
		return redirect(route('formatiom.index'));

	}

}
