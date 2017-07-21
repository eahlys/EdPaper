<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Input;
use App\User;
use App\Doc;
use App\Categorie;

class DocumentsController extends Controller
{
	public function add(){
		if (!Auth::check()) return redirect('/login');
		$cats = Categorie::where('userId', Auth::user()->id)->orderBy('title', 'ASC')->get();
		return view('doc.add', ['cats' => $cats]);
	}

	public function upload(Request $request){
		$this->validate($request, [
			'title' => 'required|max:20',
			'file' => 'required[max:50000'
			]);
		if (!Auth::check()) return redirect('/login');
		if (substr($request->document->getClientOriginalName(), -4) != ".pdf") return redirect('/doc/add');
		$checkExists = Doc::where([['userId', '=', Auth::user()->id], ['title', '=', Input::get('title')]])->first();
		if (!is_null($checkExists)) return redirect('/doc/add');
		$path = str_replace("docs/", "", $request->file('document')->store('docs'));
		$doc = Doc::create([
			'userId' => Auth::user()->id,
			'title' => Input::get('title'),
			'docname' => $path,
			]);
		$doc->categories()->attach(Input::get('catId'));
		return redirect('/');
	}
}
