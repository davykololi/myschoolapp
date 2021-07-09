<?php

namespace App\Http\Controllers\Admin;

use App\Models\Note;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadNotesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function dowmloadNotes($noteId)
    {
    	$note = Note::where('id',$noteId)->firstOrFail();
    	$path = public_path().'/storage/files/'.$note->file;

    	return response()->download($path);
    }
}
