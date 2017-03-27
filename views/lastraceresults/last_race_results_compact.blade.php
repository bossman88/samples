<!-- This box is called in a 5 column wide container in the file general-overview-compact  -->

<div class="compact-last-results-box" id="compact-last-results-box">
	<h3>Result Last Race</h3>{{$stage_name->name }} - {{$stage_name->date_start}}
	 <p>
       <table>
      <thead>
        <tr>
        <td style="padding: 0.5px;"><strong>Position</strong></td>
        <td style="padding: 2px;"><strong>Rider</strong></td>
        <td style="padding: 2px;"><strong>Points</strong></td>      
        </tr>       
      </th>
      <tbody>
          @php 
            $i = 0
          @endphp   

        
          @foreach($race_results as $result)
		
		 
            @if($i % 2 == 0) 
            <tr class="upcoming-races-light-red" id="rider-standing-light-red">  
              <td style="width: 100px; padding: 2px;">{{$result->pivot->position}}</td>
              <td style="width: 500px; padding: 2px;"><a type="button" data-asset="{{$result->id}}" href="#riderModal" data-toggle="modal" data-whatever="@mdo">{{$result->first_name.' '. $result->last_name}}</a> </td> 
              <td>{{$result->pivot->points}}</td>              
            </tr> 
             @elseif($i % 2 == 1) 
             <tr class="upcoming-results-dark-red" id="rider-standing-dark-red">  
              <td style="width: 100px; padding: 2px;">{{$result->pivot->position}} </td>
              <td style="width: 500px; padding: 2px;"><a type="button" data-asset="{{$result->id}}" href="#riderModal" data-toggle="modal" data-whatever="@mdo">{{$result->first_name.' '. $result->last_name}}</a></td> 
              <td>{{$result->pivot->points}}</td>              
            </tr> 
            @endif
            @php
               $i++
            @endphp          
          @endforeach       
    </tbody>
    </table>
    <a>see full race result...</a>
    </p>



</div>

<style type="text/css">

	#compact-last-results-box{
	    height: 40%;
	  
	    margin-top: 2%;
	}

</style>
 <script>
  /////USER TEAM /////////////////////
$(function(){
    $('#riderTeamModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal

        var asset_id = $(button).data('asset'),
            modal = this;
            console.log(asset_id);
        $(modal).addClass('loading');

        $(this).find('.modal-content').load(

            '{{action('AjaxDetailController@show_rider','')}}', // fill this in with Laravel   with real scriptURL   which will supply for HTML

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