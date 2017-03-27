@extends('layout')

@section('main-content')
  <div class="row col-sm-12">
    <div class="col-sm-10 personal-dashboard-container" id="personal-dashboard-container" >
        <div class="race_calendar-container col-sm-11">
          @include('dashboard/racecalendar/race_calendar')          
          </div>
    </div>         
  
        <div class="col-sm-2" id="side-login">
          @include('auth/sidelogin')  
          @include('twitter/twitter') 
        </div>
    </div>    
</div>

@endsection


<style type="text/css">
  



</style>