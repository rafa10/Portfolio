<?php namespace App\Http\Controllers;

use App\Competences;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 */
	public function profile()
	{
		$user = Auth::user();
		$competences = Competences::all();
		return view('user/profile', compact('user','competences'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function settings()
	{
		$user = Auth::user();
		return view('user/settings', compact('user'));
	}


	public function update(Request $request)
	{
		$user = Auth::user();
		$user->update($request->only('name', 'lastname', 'age', 'address', 'title', 'description', 'phone', 'email'));
		//  upload image
		$file = $request->input('photo');
		if(!empty($file)){
			$filename = basename($user->photo);
			$filename = public_path().'/uploads/user/'.$filename;
			File::delete($filename);
			$photo = Input::file('photo');
			if(Input::hasFile('photo')){
				$fileName = $photo->getClientOriginalName();
				$extension = $photo->getClientOriginalExtension();
				$fileName = rand(11111,99999).'.'.$extension;
				$destinationPath = public_path().'/uploads/user';
				$photo->move($destinationPath, $fileName);
			}
			$user->photo = asset('/uploads/user/'.$fileName);
			$user->save();
		}
		Session::flash('update', 'User successfully updated!');
		return redirect(route('account.settings'));


	}

	public function changePassword()
	{
		$user = Auth::user();
		return view('user/change_password', compact('user'));
	}

	protected function updatePassword(PasswordRequest $request)
	{
		$user = Auth::user();
		if($request->has('password')) {
			$user->password = bcrypt($request->password);
		}
		$user->save();
		Session::flash('update', 'User password successfully updated!');
		return redirect(route('account.change_password'));
	}

}
