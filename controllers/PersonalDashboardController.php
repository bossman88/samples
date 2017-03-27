<?php

//This controller is the first screen someone gets to see when he logs in. There should be some general information about classifications etc.

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Race;
use App\Rider;
use App\Userteam;
use App\User;
use App\Team;


class PersonalDashboardController extends Controller
{

    public function __construct()
    {
        // This will not allow guest user to see all the sections of that controller, so only logged in users have access
        $this->middleware('auth');
    }


     public function index()
    {
        //1. We assign logged in user to that variable to display with it his existing teams
       $user_id = Auth::id();

       //2. We select all existing userteams
       $userteams = UserTeam::where('user_id', Auth::id())->get();  

       //3. Converting laravel collection in array to check in view for existence of userteams,  if it that array is empty , create a new team view will be displayed
       $ut = $userteams->toArray(); 

       //4. We take 15 userteams  and order it by point , we print best 15 userteams.
       $leaderboard = Userteam::orderBy('points', 'desc')->take(15)->get(); 
       //5. We sort all races by date, take out the last race,  we retrieve all the participated riders in that race, we take 15 riders.
       // we order them by position to print out best 15 riders
      $race_results = Race::Orderby('date_start', 'desc')->first()->riders()->take(15)->Orderby('position', 'asc')->get();  
     
    //6. Using this query to print out name of the last race in lastrace result view blade 
      $stage_name = Race::Orderby('date_start', 'desc')->first(); 
      
      //7. We retrieve 13 upcoming races in the season by date_start
       $compactcalendar = Race::orderBy('date_start','desc')->take(13)->get();

       //8. We retrieve 15 best ranked riders by points in a season
       $compactclass = Rider::orderBy('total_rider_points','desc')->take(15)->get();

       //9. We return the view and deliver it the necessary variables. 
       $logged_view = view('dashboard/home',compact('compactclass', 'compactcalendar', 'userteams','ut', 'user_id', 'race_results', 'stage_name', 'leaderboard'));
       return $logged_view;        
    }

     public function profile()
    {
        $profile_view = view('dashboard/myprofile/profile');
        return $profile_view;        
    }

    //this is the function that presents the my riders page in the personal dashboard (WITH NO preferred team selected).
    public function my_riders() 
    {   
        //1. We look for all the user's teams. These are saved in the $userteams variable.
        $userteams = UserTeam::where('user_id',Auth::id())->get();

        //2. We determine which of the user teams should be selected and shown as default (in this case the first in the database_.
        $default_userteam = UserTeam::where('user_id',Auth::id())->get()->first();

        //3. We retrieve the rider information from the default userteam.
        $userteam_riders = $default_userteam->Riders()->get();
        
        //4. We assign the nessecary variable for the rider selection search engine.
        $user_id = Auth::id();  //THE USER
        $riders = Rider::all();   //THE RIDER                     
        $teams = Team::all();     //THE TEAMS

        //5. We return the view and deliver it the necessary variables.                                      
        $riders_view = view('dashboard/myriders', compact('teams','userteams','user_id', 'userteam_riders', 'default_userteam', 'riders'));
        return $riders_view;
    }


    //this is the function that presents the my riders page in the personal dashboard (WITH a preferred selected userteam).
     public function my_riders_preferred(Request $request) //this is the function that 
    {   
        //1. We look for all the user's teams. These are saved in the $userteams variable.
        $userteams = UserTeam::where('user_id',Auth::id())->get();

        //2. We look if there is a POST variable coming fromm the page that tells us what team the user wants to view.
        $preferred_id = $request->preferred_userteam_id;

        //3. We set the default userteam to the preferred userteam. 
        $default_userteam = UserTeam::where('user_id',Auth::id())->find($preferred_id);
        
        //4. We retrieve the rider information from the default userteam.      
        $userteam_riders = $default_userteam->riders()->get();
        
        //5. We assign the nessecary variable for the rider selection search engine.
        $user_id = Auth::id();  //THE USER
        $riders = Rider::all();   //THE RIDER                     
        $teams = Team::all();     //THE TEAMS

        //6. We return the view and deliver it the necessary variables.                                 
        $riders_view = view('dashboard/myriders', compact('teams','userteams','user_id', 'userteam_riders', 'default_userteam'));
        return $riders_view;
    }

    public function handleSelectRider(Request $request) //this is the function that handles when the user hits the add rider button.
    {
            $rider_id = $request->rider_id;
            $user_team_id = $request->user_team_id; 

            $user_team = UserTeam::find($user_team_id);
            $count = $user_team->Riders()->count();

            if($count < 24) {
                if($user_team->Riders()->find($rider_id) === NULL){
                $user_team->Riders()->attach($rider_id);
                }                
            } 

           $userteams = UserTeam::where('user_id',Auth::id())->get();//we pass on the user-teams that match the user-id

        $default_userteam = UserTeam::where('user_id',Auth::id())->get()->first();

        $userteam_riders = $default_userteam->Riders()->get();
        
        $user_id = Auth::id();  
        $riders = Rider::all();                        
        $teams = Team::all();                                        
        $riders_view = view('dashboard/myriders', compact('teams','userteams','user_id', 'userteam_riders', 'default_userteam', 'riders'));
        return $riders_view;
    }


    //AT THE MOMENT THIS FUNCTION DELETES THE RIDER FROM THE COMPLETE DATABASE....
    public function handleDeleteRider(Request $request) {
             
            $rider_id = $request->rider_id;
            $user_team_id = $request->user_team_id;                     

            $user_team = UserTeam::find($user_team_id);            

            if($user_team->Riders()->find($rider_id)){
                $user_team->Riders()->detach($rider_id);                                
            }             

            $userteams = UserTeam::where('user_id',Auth::id())->get();//we pass on the user-teams that match the user-id

        $default_userteam = UserTeam::where('user_id',Auth::id())->get()->first();

        $userteam_riders = $default_userteam->Riders()->get();
        
        $user_id = Auth::id();  
        $riders = Rider::all();                        
        $teams = Team::all();                                        
        $riders_view = view('dashboard/myriders', compact('teams','userteams','user_id', 'userteam_riders', 'default_userteam', 'riders'));
        return $riders_view;
    }

  

    public function genclass()
    {
        /*
         *   store into $standings all theresults from the rider table
         *   and output the result into descending order 
         */
         $leaderboard = Userteam::orderBy('points', 'desc')->get(); 
        $standings=rider::orderBy('total_rider_points','desc')->get();
        $genclass_view = view('dashboard/generalclassification',compact('standings', 'leaderboard'));
        return $genclass_view;        
    }

     public function raceCalendar()
    {
        /*
         *   printing out race calendar  
         */
        $races = Race::all();
        $racecal_view = view('dashboard/raceCalendar', compact('races'));
        return $racecal_view;        
    }

    public function storeTeam()
    {

        //1. We validate form of adding a team name
        $this->validate(request(), [
            'team_name' => 'required'
        ]);


        //2. We insert new userteam of logged in user into the database
        UserTeam::create([
            'name' => request('team_name'),
            'user_id' => Auth::id(),
        ]);
      

      //We redirect user to the main Dashboard
        return redirect('/dashboard/myriders');
    }

    public function teamCreate()
    {   
        // View of creating new team, if userteam is missing
        $team_create_view = view('dashboard/team-create');
        return $team_create_view;

    }


}
