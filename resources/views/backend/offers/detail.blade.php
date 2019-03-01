<!-- Modal Detail Banner -->
<div class="modal" id="myModa{{ $offer->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Detail Offer: {{ $offer->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Content:</h5>
                <p>
                    {{ $offer->content }}
                </p>
                <hr>
                <h5>Images: </h5>
                <p>
                <img class="avatar" style=" width:100%;height:100%;" src="/uploads/images/offers/{{$offer->image}}">
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
