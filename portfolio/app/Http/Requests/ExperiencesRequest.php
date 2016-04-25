<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ExperiencesRequest extends Request {

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
			'fonction'    => 'required|min:5',
			'date_start'  => 'required',
			'date_end'    => 'required',
			'business'    => 'required|min:2',
			'description' => 'required|min:15',
			'url'         => 'required',
		];
	}

	public function messages()
	{
		return [
			//
		];
	}
}
