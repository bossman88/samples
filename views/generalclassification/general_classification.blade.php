<!-- This box is called in a 11 column wide container in the file generalclassifications.blade.php -->

<div class="general-classification-box" id="general-classification-box">
  	<h3>User Classifications</h3>
  <p>
       <table>
      <thead>
        <tr>
        <td style="padding: 0.5px;"><strong>Position</strong></td>
        <td style="padding: 2px;"><strong>Userteam</strong></td>
        <td style="padding: 2px;"><strong>City</strong></td>
        <td style="padding: 2px;"><strong>Points</strong></td>      
        </tr>       
      </th>
      <tbody>
          @php 
            $i = 0; $number = 1
          @endphp   

          @foreach($leaderboard as $userteam)
		
		 
            @if($i % 2 == 0) 
            <tr class="upcoming-races-light-red" id="rider-standing-light-red">  
              <td style="width: 100px; padding: 2px;">{{$number++}}</td>
              <td style="width: 500px; padding: 2px;"><a type="button" data-asset="{{$userteam->id}}" href="#userTeamModal" data-toggle="modal" data-whatever="@mdo">{{$userteam->name}}</a> </td> 
              <td style="width: 300px; padding: 2px;">{{$userteam->user->city}}</td> 
              <td >{{$userteam->points}}</td>              
            </tr> 
             @elseif($i % 2 == 1) 
             <tr class="upcoming-results-dark-red" id="rider-standing-dark-red">  
              <td style="width: 100px; padding: 2px;">{{$number++}}</td>
              <td style="width: 500px; padding: 2px;"><a type="button" data-asset="{{$userteam->id}}" href="#userTeamModal" data-toggle="modal" data-whatever="@mdo">{{$userteam->name}}</a></td> 
              <td style="width: 300px; padding: 2px;">{{$userteam->user->city}}</td> 
              <td>{{$userteam->points}}</td>              
            </tr> 
            @endif
            @php
               $i++
            @endphp          
          @endforeach       
    </tbody>
    </table>
   
    </p>
</div>

<div class="modal fade" id="userTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

        

        </div>

  </div>

</div>

<style type="text/css">
 #rider-standing-light-red {
    background-color: #ffe6e6;
  }

  #rider-standing-dark-red {
      background-color: #ffcccc;
  }

	#general-classification-box{
	    height: 80%;
	    margin-top: 2%;
	}

	 scrollbar-style-2::-webkit-scrollbar-track
{
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  border-radius: 10px;
  background-color: #F5F5F5;
}

.scrollbar-style-2::-webkit-scrollbar
{
  width: 12px;
  background-color: #F5F5F5;
}

.scrollbar-style-2::-webkit-scrollbar-thumb
{
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
  background-color: #D62929;
}

   .general-classification-box {
        height:732px;
        overflow: scroll;
      overflow-x: hidden;
    }

</style>

 <script>
  /////USER TEAM /////////////////////
$(function(){
    $('#userTeamModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal

        var asset_id = $(button).data('asset'),
            modal = this;
            console.log(asset_id);
        $(modal).addClass('loading');

        $(this).find('.modal-content').load(

            '{{action('AjaxDetailController@show_userteam','')}}', // fill this in with Laravel   with real scriptURL   which will supply for HTML

            $.param({

                asset: asset_id // data passed to the API

            }), 

            function() { 

                $(modal).removeClass('loading');

            }

        );

    })
});

</script>
