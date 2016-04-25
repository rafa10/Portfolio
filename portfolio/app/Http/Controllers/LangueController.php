<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\LangueRequest;
use App\Langue;
use App\Loisier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangueController extends Controller {

	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$langue = Langue::all();

		return view('langue/index', ['langue' => $langue]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('langue/create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(LangueRequest $request)
	{
		$langue = Langue::create($request->all());
		Session::flash('create', 'Langue successfully added!');
		return redirect(route('langue.index'));
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
		$langue = Langue::findOrFail($id);
		return view('langue/edit', compact('langue','id'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update($id, LangueRequest $request)
	{
		$langue = Langue::findOrFail($id);
		$langue->update($request->all());
		Session::flash('update', 'Langue successfully updated!');
		return redirect(route('langue.edit', $id));
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		$langue = Langue::findOrFail($id);
		$langue->delete();
		Session::flash('delete', 'Langues successfully deleted!');
		return redirect(route(('langue.index')));
	}

}
