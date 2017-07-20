<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Input;
use App\User;

class DashController extends Controller
{
	public function index(){
		if (!Auth::check()) return view('index');
		return view('dashboard');
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
			]);
		$user = User::where('id', Auth::user()->id)->first();
		$user->name = Input::get('name');
		$user->save();
		return redirect('/account');
	}
	
}
