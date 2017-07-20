<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Input;
use App\User;
use App\Doc;

class DashController extends Controller
{
	public function index(){
		if (!Auth::check()) return view('index');
		$lastDocs = Doc::where('userId', Auth::user()->id)->orderBy('id', 'desc')->limit(5)->get();
		$numberDocs = Doc::where('userId', Auth::user()->id)->count();
		return view('dashboard', ['lastDocs' => $lastDocs, 'numberDocs' => $numberDocs]);
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
			'email' => 'required|email'
			]);
		$user = User::where('id', Auth::user()->id)->first();
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->save();
		return redirect('/account');
	}
	
}
