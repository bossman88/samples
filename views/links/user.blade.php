
 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">{{$race->name}}</h3>
      </div> 
      <div class="modal-body">
        <strong><span>Race Name: </span></strong> {{$race->name}} <br>
        <strong><span>Date start: : </span></strong> {{$race->date_start}}<br>
        <strong><span>Hills:</span></strong>{{$race->hills}} <br>
        <strong><span>Cobbles:</span></strong> {{$race->cobbles}} <br>
        <strong><span>Mountains:</span></strong> {{$race->mountains}} <br>
        <strong><span>Sprint:</span></strong> {{$race->sprint}}<br>
        <strong><span>Time Trial:</span></strong> {{$race->timetrial}} <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
