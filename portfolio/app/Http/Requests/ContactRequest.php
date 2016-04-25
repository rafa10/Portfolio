<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request {

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
			'name'  => 'required|min:4',
			'email' => 'required|email',
			'subject' => 'required|min:4',
			'message' => 'required|min:5'
		];
	}
	public function messages()
	{
		return [
			'name.required' => 'Le name est obligatoire',
			'email.required' => 'Le email est obligatoire',
			'subject.required' => 'Le subject est obligatoire',
			'message.required' => 'Le message est obligatoire',
		];
	}

}
