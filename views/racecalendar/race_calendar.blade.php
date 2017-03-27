<h2>Upcoming Races</h2>
<div class="all-races"> 
    <table>
      <thead>
        <tr>
        <td><strong>Race name</strong></td>
        <td><strong>Starts:</strong></td>
        <td><strong>Country:</strong></td>      
        </tr>       
      </th>
      <tbody>               
          @foreach ($races as $race)
            <tr> 
              <td style="width: 500px;"><a type="button" data-asset="{{$race->id}}" href="#raceModal" data-toggle="modal" data-whatever="@mdo">{{ $race->name}} </a> </td>   
              <td>{{$race->date_start}}</td>
              <td>{{$race->country}}</td>
              <td><img src="url({{asset($race->country_flag)}})" alt="flag-image"></td>               
            </tr>
          @endforeach       
    </tbody>
    </table>
</div>


<div class="modal fade" id="raceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

    

    </div>

  </div>

</div>


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