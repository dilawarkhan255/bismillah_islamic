<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.courses');
    }

    public function projects()
    {
        return view('projects');
    }

    public function features()
    {
        return view('features');
    }

    public function team()
    {
        return view('team');
    }

    public function testimonial()
    {
        return view('testimonial');
    }

    public function contact()
    {
        return view('contact');
    }

    public function enroll()
    {
        return view('enroll');
    }
}
