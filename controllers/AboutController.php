<?php

//this page is for showing general information about the game for users that are not logged in. This is accessible from the homepage.

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\race;

class AboutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutpage_view = view('about/about');
        return $aboutpage_view;        
    }

    public function prizes()
    {
        $aboutprizes_view = view('about/aboutprizes');
        return $aboutprizes_view;        
    }

    public function points()
    {
        $aboutpoints_view = view('about/aboutpoints');
        return $aboutpoints_view;        
    }

    public function costs()
    {
        $aboutcosts_view = view('about/aboutcosts');
        return $aboutcosts_view;        
    }

     public function deadlines()
    {
        $races = race::all();
        $aboutdeadlines_view = view('about/aboutdeadlines', compact('races'));
        return $aboutdeadlines_view;        
    }

    public function faq()
    {
        $aboutfaq_view = view('about/aboutfaq');
        return $aboutfaq_view;        
    }
}