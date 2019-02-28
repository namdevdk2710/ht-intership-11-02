<!-- Modal Detail Banner -->
<div class="modal" id="myModa{{ $cuisineDetail->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Detail Cuisine: {{ $cuisineDetail->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Group Cuisine:</h5>
                <p>
                    {{ $cuisineDetail->cuisine->name }}
                </p>
                <hr>
                <h5>Description:</h5>
                <p>
                    {{ $cuisineDetail->description }}
                </p>
                <hr>
                <h5>Images Cuisine Detail: </h5>
                <p>
                    @if(!empty($cuisineDetail->image))
                    <img class="avatar" style=" width:100%;height:100%;" src="/uploads/images/cuisineDetails/{{$cuisineDetail->image}}">
                    @endif
                </p>
                <hr>
                <h5>Content: </h5>
                <p>
                    {{ $cuisineDetail->content }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
