<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompetencesRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 */
	public function rules()
	{
		return [
			'name'   => 'required|min:2',
			'logo'   => 'required',
			'rating' => 'required',
		];
	}

	public function messages()
	{
		return [
			'name.required'   => 'Le nom et obligatoire',
			'logo.required'   => 'le logo et obligatoire',
			'rating.required' => 'l"evolution et obligatoire',

			'name.min'        => 'le nom doit avoire au mois de lettre',
		];
	}

}
