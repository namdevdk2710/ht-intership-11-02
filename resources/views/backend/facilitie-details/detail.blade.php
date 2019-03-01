<!-- Modal Detail Banner -->
<div class="modal" id="myModa{{ $facilitieDetail->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Detail facilitie: {{ $facilitieDetail->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Group facilitie:</h5>
                <p>
                    {{ $facilitieDetail->facilitie->name }}
                </p>
                <hr>
                <h5>Description:</h5>
                <p>
                    {{ $facilitieDetail->description }}
                </p>
                <hr>
                <h5>Images facilitie Detail: </h5>
                <p>
                    @if(!empty($facilitieDetail->image))
                    <img class="avatar" style=" width:100%;height:100%;" src="/uploads/images/facilitieDetails/{{$facilitieDetail->image}}">
                    @endif
                </p>
                <hr>
                <h5>Content: </h5>
                <p>
                    {{ strip_tags($facilitieDetail->content) }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
