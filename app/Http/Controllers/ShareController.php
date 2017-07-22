<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Doc;
use App\Share;
use Response;

class ShareController extends Controller
{
	public function share($id){
		if (!Auth::check()) return redirect('/login');
		$doc = Doc::where([['userId', '=', Auth::user()->id], ['id', '=', $id]])->firstOrFail();
		$existShare = Share::where([['userId', '=', Auth::user()->id], ['docId', '=', $id]])->first();
		if (!is_null($existShare)) $link = $existShare->link;
		else {
			$gen_link = str_random(10);
			while (!is_null(Share::where('link', $gen_link)->first())) {
				$gen_link = str_random(10);
			}
			$share = Share::create([
				'userId' => Auth::user()->id,
				'docId' => $doc->id,
				'link' => $gen_link,
				]);
			$link = $share->link;
		}
		return view('share.create', ['doc' => $doc, 'link' => $link, 'path' => $_SERVER['SERVER_NAME']]); 	
	}

	public function show($link){
		$share = Share::where('link', $link)->firstOrFail();
		return view('share.show', ['share' => $share]); 
	}

	public function view($link){
		$share = Share::where('link', $link)->firstOrFail();
		return Response::make(file_get_contents(storage_path('app/' . $share->doc->docname)), 200, [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="'.$share->doc->title.'.pdf"'
			]);
	}

	public function download($link){
		$share = Share::where('link', $link)->firstOrFail();
		return response()->download(storage_path('app/' . $share->doc->docname), $share->doc->title.'.pdf');
	}


	public function disable($id){
		if (!Auth::check()) return redirect('/login');
		$doc = Doc::where([['userId', '=', Auth::user()->id], ['id', '=', $id]])->firstOrFail();
		$share = Share::where([['userId', '=', Auth::user()->id], ['docId', '=', $id]])->firstOrFail();
		$share->forceDelete();
		return view ('share.disable', ['doc' => $doc]);
	}
}
