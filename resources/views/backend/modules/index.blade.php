@extends('backend.layouts.master')

@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-th-list"></i> List Modules
            </h1>
            <p>Display all lists modules</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">admin</li>
            <li class="breadcrumb-item active"><a href="#">module</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <a class="btn btn-primary icon-btn" href="{{route('module.create')}}">
                                    <i class="fa fa-plus"></i>Create module
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="sampleTable_filter" class="dataTables_filter">
                                    @include('backend.layouts.search', ['route' => route('module.index')])
                                </div>
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
                                        @foreach($modules as $key => $module)
                                        <tr role="row" class="odd">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $module->name }}</td>
                                            <td>{{ str_limit($module["description"], 50) }}</td>
                                            <td>
                                                <img width="100%" src="uploads/images/modules/{{ $module->image }}">
                                            </td>
                                            <td class = "btn-changstatus-{{$module->id}}">
                                                <button

                                                    class="btn btn-{{$module->status == 1 ? 'warning' : 'success'}}"
                                                    onclick="changeStatus({{$module->id}})"
                                                >
                                                    {{$module->status == 1 ? 'ON' : 'OFF '}}
                                                </button>
                                            </td>
                                            <td>
                                                <a href="backend/modules/index/{{ $module->id }}" class="btn btn-info" data-toggle="modal" data-target="#myModa{{ $module->id }}">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{route('module.edit', ['id'=>$module->id])}}" class="btn btn-warning">
                                                    <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @include('backend.modules.detail')
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="float: right;">
                                    {{ $modules->links() }}
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
            url: "{{route('module.changestatus')}}",
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

