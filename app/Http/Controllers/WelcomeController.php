<?php

namespace App\Http\Controllers;

use SEOMeta;
use OpenGraph;
use Twitter;
use JsonLd;
use Illuminate\Support\Facades\URL;
use App\Models\Event;
use App\Services\ImageGalleryService;
use App\Services\TeacherService;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    protected $imageGalleryService, $teacherService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ImageGalleryService $imageGalleryService, TeacherService $teacherService)
    {
        $this->middleware('guest');
        $this->imageGalleryService = $imageGalleryService;
        $this->teacherService = $teacherService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title = ucfirst(config('app.name'))." App";
        $desc = "School App Management System";
        $keywords = 'School, School App, School Management System';
        $logo = 'https://kabianga.edu/static/favicon.png';
        $url = URL::current();
        $imageGalleries = $this->imageGalleryService->all();
        $teachers = $this->teacherService->all();


        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','Website');
        OpenGraph::addProperty('locale','en-US');

        Twitter::setTitle($title);
        Twitter::setSite('@somaapp');
        Twitter::setDescription($desc);
        Twitter::setUrl($url);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Website');
        JsonLd::addImage($logo);

        if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }
        
        return view('welcome',compact('title','imageGalleries','teachers'));
    }
}
