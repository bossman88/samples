
 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">{{$team->team_name}}</h3>
      </div> 
      <div class="modal-body">
        @php $num=0; @endphp
     @foreach($team->riders as $rider)
     {{$num++}}) {{$rider->first_name}} {{$rider->last_name}} .  <br> 
     @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
