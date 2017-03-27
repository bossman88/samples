<!-- This box is called in a 5 column wide container in the file general-overview-compact  -->

<div class="compact-general-classification-box" id="compact-general-classification-box">
	<h3>General classification</h3>
   <p>
       <table>
      <thead>
        <tr>
        <td style="padding: 0.5px;"><strong>Position</strong></td>
        <td style="padding: 2px;"><strong>Userteam</strong></td>
        <td style="padding: 2px;"><strong>Points</strong></td>      
        </tr>       
      </th>
      <tbody>
          @php 
            $i = 0; $num = 1
          @endphp   

          @foreach($leaderboard as $userteam)
		
		 
            @if($i % 2 == 0) 
            <tr class="upcoming-races-light-red" id="rider-standing-light-red">  
              <td style="width: 100px; padding: 2px;">{{$num++}}</td>
              <td style="width: 500px; padding: 2px;"><a type="button" data-asset="{{$userteam->id}}" href="#userTeamModal" data-toggle="modal" data-whatever="@mdo">{{$userteam->name}}</a> </td> 
              <td>{{$userteam->points}}</td>              
            </tr> 
             @elseif($i % 2 == 1) 
             <tr class="upcoming-results-dark-red" id="rider-standing-dark-red">  
              <td style="width: 100px; padding: 2px;">{{$num++}}</td>
              <td style="width: 500px; padding: 2px;"><a type="button" data-asset="{{$userteam->id}}" href="#userTeamModal" data-toggle="modal" data-whatever="@mdo">{{$userteam->name}}</a></td> 
              <td>{{$userteam->points}}</td>              
            </tr> 
            @endif
            @php
               $i++
            @endphp          
          @endforeach       
    </tbody>
    </table>
    <a>see full general classification...</a>
    </p>
</div>

<div class="modal fade" id="userTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

        

        </div>

  </div>

</div>

<style type="text/css">

	#compact-general-classification-box{
	    height: 40%;
	   
	    margin-top: 2%;
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