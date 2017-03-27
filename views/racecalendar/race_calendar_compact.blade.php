<!-- This box is called in a 5 column wide container in the file general-overview-compact  -->

<div class="compact-race-calendar-box" id="compact-race-calendar-box">  
<h3>Upcoming races</h3>	
  	 <p>
       <table>
      <thead>
        <tr>
        <td style="padding: 2px;"><strong>Name</strong></td>
        <td style="padding: 2px;"><strong>Date</strong></td>
        <td style="padding: 2px;"><strong>Country</strong></td>      
        </tr>       
      </th>
      <tbody>
          @php 
            $i = 0
          @endphp   

          @foreach ($compactcalendar as $race)
            @if($i % 2 == 0) 
            <tr class="upcoming-races-light-red" id="rider-standing-light-red">  
              <td style="width: 500px; padding: 2px;"><a type="button" data-asset="{{$race->id}}" href="#raceModal" data-toggle="modal" data-whatever="@mdo">{{$race->name}}</a> </td>
              <td style="width: 200px; padding: 2px;">{{$race->date_start}}</td> 
              <td>{{$race->country}}</td>              
            </tr> 
             @elseif($i % 2 == 1) 
             <tr class="upcoming-races-dark-red" id="rider-standing-dark-red">  
              <td style="width: 500px; padding: 2px;"><a type="button" data-asset="{{$race->id}}" href="#raceModal" data-toggle="modal" data-whatever="@mdo">{{$race->name}}</a> </td>
              <td style="width: 200px; padding: 2px;">{{$race->date_start}}</td> 
              <td>{{$race->country}}</td>              
            </tr> 
            @endif
            @php
               $i++
            @endphp          
          @endforeach       
    </tbody>
    </table>
    <a>see full race calendar...</a>
    </p>
</div>




<div class="modal fade" id="raceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

    

    </div>

  </div>

</div>

<style type="text/css">

	#compact-race-calendar-box{
	    height: 40%;
	    margin-top: 2%;
	}

  #rider-standing-light-red{
    background-color: #ffe6e6;
  }

  #rider-standing-dark-red {
      background-color: #ffcccc;
  }

</style>

 <script>
$(function(){
    $('#raceModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal

        var asset_id = $(button).data('asset'),
            modal = this;
            console.log(asset_id);
        $(modal).addClass('loading');

        $(this).find('.modal-content').load(

            '{{action('AjaxDetailController@show_race','')}}', // fill this in with Laravel   with real scriptURL   which will supply for HTML

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



