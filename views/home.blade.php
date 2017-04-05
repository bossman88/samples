@extends('layout')

@section('main-content')
  <div class="row col-sm-12">
    <div class="col-sm-10 personal-dashboard-container" id="personal-dashboard-container" >

        <div class="user-riders-container col-sm-10">
        {{-- userteams --}} 
      
        @if (!empty($ut))         
           @include('dashboard/myriders/my-riders-noselect')
        @else
          @include('dashboard/myriders/no-teams-yet')
        @endif
            {{-- end userteams --}}

          <!-- NOTE THIS: If the user does not have a team yet, there should be included: dashboard/myriders/no-team-yet -->
          </div>

          @include('dashboard/generaloverview/general-overview-compact') <!-- NOTE THIS: the general overview consists out of several compact representations of statistics. -->

        </div>
  
        <div class="col-sm-2" id="side-login">
          @include('auth/sidelogin')  
          @include('twitter/twitter') 
        </div>
    </div>    
</div>
@endsection



{{-- <style type="text/css">
  



</style> --}}
