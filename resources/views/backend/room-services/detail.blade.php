<!-- Modal Detail Banner -->
<div class="modal" id="myModa{{ $roomservice->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Detail Banner: {{ $roomservice->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Description:</h5>
                <p>
                    {{ $roomservice->description }}
                </p>
                <hr>
                <h5>Icon Room Service: </h5>
                <p>
                    @if(!empty($roomservice->icon))
                    <img class="avatar" style=" width:100%;height:100%;" src="backend/upload/images/{{ $roomservice->icon }}">
                    @endif
                </p>
                <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
