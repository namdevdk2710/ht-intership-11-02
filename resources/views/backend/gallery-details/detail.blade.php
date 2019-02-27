<!-- Modal Detail Banner -->
<div class="modal" id="myModa{{ $galleryDetail->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Detail Gallery Detail: {{ $galleryDetail->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Description:</h5>
                <p>
                    {{ $galleryDetail->description }}
                </p>
                <hr>
                <h5>Images: </h5>
                <p>
                <img class="avatar" style=" width:100%;height:100%;" src="/uploads/images/galleryDetails/{{$galleryDetail->image}}">
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
