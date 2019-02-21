<!-- Modal Detail Banner -->
<div class="modal" id="myModa{{ $baner->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Detail Banner: {{ $baner->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Description:</h5>
                <p>
                    {{ $baner->description }}
                </p>
                <hr>
                <h5>Images Banner: </h5>
                <p>
                    @if(!empty($baner->image))
                    <img class="avatar" style=" width:100%;height:100%;" src="backend/upload/images/a.jpg">
                    @endif
                </p>
                <hr>
                <h5>Link: </h5>
                <p>
                    {{ $baner->link }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
