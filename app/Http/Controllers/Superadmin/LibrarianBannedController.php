<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\LibrarianService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibrarianBannedController extends Controller
{
    protected $librarianService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LibrarianService $librarianService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->librarianService = $librarianService;
    }

    public function bann(Request $request, $id)
    {
        $librarian = $this->librarianService->getId($id);
        $librarian->is_banned = true;
        $librarian->save();

        return back()->withSuccess('The librarian banned successfully');
    }

    public function unbann(Request $request, $id)
    {
        $librarian = $this->librarianService->getId($id);
        $librarian->is_banned = false;
        $librarian->save();

        return back()->withSuccess('The librarian ban lifted up successfully');
    }
}
