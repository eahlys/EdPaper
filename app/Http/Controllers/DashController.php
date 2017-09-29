<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Hash;
use \Input;
use App\User;
use App\Doc;

class DashController extends Controller
{
	public function index(){
		if (!Auth::check()) return view('index');
		$lastDocs = Doc::where('userId', Auth::user()->id)->orderBy('id', 'desc')->limit(10)->get();
		return view('dashboard', ['lastDocs' => $lastDocs]);
	}

	public function account(){
		if (!Auth::check()) return redirect('/login');
		$user = User::where('id', Auth::user()->id)->first();

		return view('account', ['user' => $user]);
	}

	public function editAccount(Request $request){
		if (!Auth::check()) return redirect('/login');
		$this->validate($request, [
			'name' => 'max:30|required',
			'email' => 'required|email',
			'password' => 'max:100|min:6',
			'passwordconfirm' => 'max:100|min:6',
			'currentpassword' => 'max:100',
		]);
		$user = User::where('id', Auth::user()->id)->first();
		$checkEmail = User::where('email', Input::get('email'))->first();
		if (!is_null($checkEmail) && $checkEmail->id != Auth::user()->id) return Redirect::back()->withErrors(['Specified e-mail address already exists']);
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		if (Input::get('password') != "") {
			if (Input::get('password') != Input::get('passwordconfirm')) return Redirect::back()->withErrors(['Password confirmation does not match. Please try again']);
			if (Hash::check(Input::get('currentpassword'), $user->password))
			{
				$user->password = Hash::make(Input::get('password'));
			}
			else return Redirect::back()->withErrors(['Current password is incorrect. Please try again.']);
 		}
		$user->save();
		return redirect('/account');
	}

}
