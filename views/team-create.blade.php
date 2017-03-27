@extends('layout')

@section('main-content')
  <div class="row col-sm-12">
    <div class="col-sm-10 personal-dashboard-container" id="personal-dashboard-container" >

     
    @include('dashboard/myriders/make-team')
          {{-- @include('dashboard/generaloverview/general-overview-compact') <!-- NOTE THIS: the general overview consists out of several compact representations of statistics. --> --}}

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
