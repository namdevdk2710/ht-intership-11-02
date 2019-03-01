@extends('backend.layouts.master')

@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-th-list"></i> List Rooms
            </h1>
            <p>Display all lists rooms</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">admin</li>
            <li class="breadcrumb-item active"><a href="#">room</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <a class="btn btn-primary icon-btn" href="{{route('room.create')}}">
                                    <i class="fa fa-plus"></i>Create room
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable" role="grid" aria-describedby="sampleTable_info">
                                    <thead>
                                        <tr role="row">
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 10px;">#</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 150px;">Name</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200px;">Description</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 100px;">Image</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 100px;">Status</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 90px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rooms as $key => $room)
                                        <tr role="row" class="odd">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $room->name }}</td>
                                            <td>{{ str_limit($room["description"], 50) }}</td>
                                            <td>
                                                <img width="100%" src="uploads/images/rooms/{{ $room->image }}">
                                            </td>
                                            <td class = "btn-changstatus-{{$room->id}}">
                                                <button
                                                    class="btn btn-{{$room->status == 1 ? 'warning' : 'success'}}"
                                                    onclick="changeStatus({{$room->id}})"
                                                >
                                                    {{$room->status == 1 ? 'ON' : 'OFF '}}
                                                </button>
                                            </td>
                                            <td>
                                                <a href="{{route('room.edit', ['id'=>$room->id])}}" class="btn btn-warning">
                                                    <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="float: right;">
                                    {{ $rooms->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('script')
<script type="text/javascript">
    function notification() {
        $.notify({
      		title: "Update Complete : ",
      		message: "Something cool is just updated!",
      		icon: 'fa fa-check'
      	},{
      		type: "info"
      	})
    }

    function changeStatus(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: "{{route('room.changestatus')}}",
            data: {
                'id': id
            },
            success: function(data) {
                console.log(data.status)
                var	button = "";
                if (data.status) {
                    button = "<button class='btn btn-warning' onclick='changeStatus("+ data.id +")'> ON </button>";
                } else {
                    button = "<button class='btn btn-success' onclick='changeStatus("+ data.id +")'> OFF </button>";
                }
                $('.btn-changstatus-' + data.id).empty();
                $('.btn-changstatus-' + data.id).append(button);
                notification();

            },
        });
    }
</script>
@endpush

