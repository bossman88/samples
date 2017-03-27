<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race;
use App\Rider;
use App\Team;
use App\Userteam;

///////showing race info
class AjaxDetailController extends Controller
{
    public function show_race(Request $request)
    {
        $race = Race::find($request->input('asset'));


        return view('links.race_detail', compact('race'));
    }
//showing rider info
    public function show_rider(Request $request)
    {
        $rider = Rider::find($request->input('asset'));


        return view('links.rider_detail', compact('rider'));
    }
//info about team
    public function show_team(Request $request)
    {
        $team = Team::find($request->input('asset'));


        return view('links.team_detail', compact('team'));
    }
//userteam info
     public function show_userteam(Request $request)
    {
        $userteam = Userteam::find($request->input('asset'));


        return view('links.userteam_detail', compact('userteam'));
    }

    public function show_rider_results(Request $request)
    {
        


        return view('links.rider_results_detail', compact('race'));
    }
}
