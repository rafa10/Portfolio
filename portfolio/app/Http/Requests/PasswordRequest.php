<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PasswordRequest extends Request {

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
			'password' => 'required|confirmed|min:6',
		];
	}
	public function messages()
	{
		return [
			'password.required' => 'votre mdp est requis',
			'password.min' => 'Votre mdp est trop court',
			'password.confirmed' => 'votre mdp doit etre identique',
		];
	}

}
