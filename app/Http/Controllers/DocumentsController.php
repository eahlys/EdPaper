<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
use \Input;
use App\User;
use Storage;
use Response;
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
			'title' => 'max:40',
			'document' => 'required|max:50000|mimes:pdf'
			]);
		if (!Auth::check()) return redirect('/login');

		if (is_null(Input::get('title'))) $title = str_replace(".pdf", "", $request->file('document')->getClientOriginalName());
		else $title = Input::get('title');
		$checkExists = Doc::where([['userId', '=', Auth::user()->id], ['title', '=', $title]])->first();
		if (!is_null($checkExists)) return Redirect::back()->withErrors(['Document title already exists']);
		$path = $request->file('document')->store('docs');
		$doc = Doc::create([
			'userId' => Auth::user()->id,
			'title' => $title,
			'docname' => $path,
			]);
		$doc->categories()->attach(Input::get('catId'));
		return redirect('/');
	}

	public function show($id){
		if (!Auth::check()) return redirect('/login');
		$doc = Doc::where([['userId', '=', Auth::user()->id], ['id', '=', $id]])->firstOrFail();
		$cats = Categorie::where('userId', Auth::user()->id)->orderBy('title', 'ASC')->get();
		$docCats = $doc->categories()->orderBy('title', 'ASC')->pluck('id')->toArray();
		return view('doc.show', ['doc' => $doc, 'cats' => $cats, 'docCats' => $docCats]); 
	}

	public function viewfile($id){
		if (!Auth::check()) return redirect('/login');
		$doc = Doc::where([['userId', '=', Auth::user()->id], ['id', '=', $id]])->firstOrFail();

		return Response::make(file_get_contents(storage_path('app/' . $doc->docname)), 200, [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="'.$doc->title.'.pdf"'
			]);
	}

	public function download($id){
		if (!Auth::check()) return redirect('/login');
		$doc = Doc::where([['userId', '=', Auth::user()->id], ['id', '=', $id]])->firstOrFail();
		return response()->download(storage_path('app/' . $doc->docname), $doc->title.'.pdf');
	}

	public function edit($id, Request $request){
		if (!Auth::check()) return redirect('/login');
		$this->validate($request, [
			'title' => 'max:40|required',
			]);
		$doc = Doc::where('id', $id)->firstOrFail();
		if ($doc->userId != Auth::user()->id) return redirect('/login');
		$doc->title = Input::get('title');
		$doc->save();
		$doc->categories()->detach();
		$doc->categories()->attach(Input::get('catId'));
		return Redirect::back();
	}


	public function delete($id){
		if (!Auth::check()) return redirect('/login');
		$doc = Doc::where('id', $id)->firstOrFail();
		if ($doc->userId != Auth::user()->id) return redirect('/login');

		Storage::delete($doc->docname);
		$doc->categories()->detach();
		$doc->forceDelete();
		return redirect('/cat/0');
	}
}
