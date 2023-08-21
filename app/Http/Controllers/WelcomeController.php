<?php

namespace App\Http\Controllers;

use App\Services\GalleryService;
use App\Services\TeacherService;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    protected $galleryService, $teacherService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GalleryService $galleryService, TeacherService $teacherService)
    {
        $this->middleware('guest');
        $this->galleryService = $galleryService;
        $this->teacherService = $teacherService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Soma App";
        $galleries = $this->galleryService->all();
        $teachers = $this->teacherService->all();
        
        return view('welcome',compact('title','galleries','teachers'));
    }
}
