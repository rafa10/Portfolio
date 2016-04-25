<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class FormationRequest extends Request {

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
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'type'         => 'required|min:4',
			'description'  => 'required|min:10',
			'year'         => 'required|min:4|max:4',
		];
	}


	public function messages()
	{
		return [
			//
		];
	}

}
