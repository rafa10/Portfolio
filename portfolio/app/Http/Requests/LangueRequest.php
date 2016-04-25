<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LangueRequest extends Request {

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
			'name'        => 'required|min:4',
		    'description' => 'required',
 		];
	}

	public function messages()
	{
		return [
			'name.required'        => 'Le champs est obligatoire!',
			'description.required' => 'Le champs est obligatoire!',
		];
	}

}
