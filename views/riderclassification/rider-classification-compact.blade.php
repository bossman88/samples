<!-- This box is called in a 5 column wide container in the file general-overview-compact  -->

<div class="compact-rider-classification-box" id="compact-rider-classification-box">
  <h3>Best performing riders</h3>
   <p>
       <table>
      <thead>
        <tr>
        <td style="padding: 2px;"><strong>Position</strong></td>
        <td style="padding: 2px;"><strong>Name</strong></td>
        <td style="padding: 2px;"><strong>Team</strong></td>
        <td style="padding: 2px;"><strong>Points</strong></td>      
        </tr>       
      </th>
      <tbody>
          @php $i = 0;  $num=1 @endphp              
         @foreach ($compactclass as $standing)
            @if($i % 2 == 0) 
            <tr class="rider-standing-light-red" id="rider-standing-light-red">  
              <td style="width: 100px; padding: 2px;">{{$num++}} </td>
              <td style="width: 500px; padding: 2px;"><a type="button" data-asset="{{$standing->id}}" href="#riderModal" data-toggle="modal" data-whatever="@mdo">{{$standing->first_name.' '. $standing->last_name}}</a> </td>
              <td style="width: 200px; padding: 2px;"><a type="button" data-asset="{{$standing->team->id}}" href="#teamModal" data-toggle="modal" data-whatever="@mdo">{{$standing->team->team_name}}</a></td> 
              <td>{{$standing->total_rider_points}}</td>              
            </tr> 
            @elseif($i % 2 == 1)
            <tr class="rider-standing-dark-red" id="rider-standing-dark-red">  
              <td style="width: 100px; padding: 2px;">{{$num++}} </td>
              <td style="width: 500px; padding: 2px;"><a type="button" data-asset="{{$standing->id}}" href="#riderModal" data-toggle="modal" data-whatever="@mdo">{{$standing->first_name.' '. $standing->last_name}}</a> </td>
              <td style="width: 200px; padding: 2px;"><a type="button" data-asset="{{$standing->team->id}}" href="#teamModal" data-toggle="modal" data-whatever="@mdo">{{$standing->team->team_name}}</a></td> 
              <td>{{$standing->total_rider_points}}</td>              
            </tr> 
            @endif
            @php $i++  @endphp          
          @endforeach       
    </tbody>
    </table>
   <a type="button" data-asset="" href="#riderResultModal" data-toggle="modal" data-whatever="@mdo">see full rider classification...</a>
    </p>
</div>

<div class="modal fade" id="riderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

        

        </div>

  </div>

</div>

<div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

        

        </div>

    </div>

</div>

<div class="modal fade" id="riderResultsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

        

        </div>

    </div>

</div>

<style type="text/css">

	#compact-rider-classification-box{
	    height: 40%;	    
	    margin-top: 2%;
      margin-bottom:30%;
	}

  #rider-standing-light-red {
    background-color: #ffe6e6;
  }

  #rider-standing-dark-red {
      background-color: #ffcccc;
  }
	
	</style>
  <script>
  /////RIDER MODAL /////////////////////
$(function(){
    $('#riderModal').on('show.bs.modal', function (event) {

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
/////RIDER MODAL END////////////////
////----**************------///////
/////////TEAM MODAL/////////////////
$(function(){
    $('#teamModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal

        var asset_id = $(button).data('asset'),
            modal = this;
            console.log(asset_id);
        $(modal).addClass('loading');

        $(this).find('.modal-content').load(

            '{{action('AjaxDetailController@show_team','')}}', // fill this in with Laravel   with real scriptURL   which will supply for HTML

            $.param({

                asset: asset_id // data passed to the API

            }), 

            function() { 

                $(modal).removeClass('loading');

            }

        );

    })
});

$(function(){
    $('#riderResultsModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal

        var asset_id = $(button).data('asset'),
            modal = this;
            console.log(asset_id);
        $(modal).addClass('loading');

        $(this).find('.modal-content').load(

            '{{action('AjaxDetailController@show_rider_results','')}}', // fill this in with Laravel   with real scriptURL   which will supply for HTML

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
