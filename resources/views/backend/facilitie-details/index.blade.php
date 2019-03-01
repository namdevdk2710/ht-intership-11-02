@extends('backend.layouts.master')

@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-th-list"></i> List Facilitie Details
            </h1>
            <p>Display all lists facilitie details</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">admin</li>
            <li class="breadcrumb-item active"><a href="#">facilitie details</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <a class="btn btn-primary icon-btn" href="{{route('facilitie_detail.create')}}">
                                    <i class="fa fa-plus"></i>Create
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="sampleTable_filter" class="dataTables_filter">
                                    @include('backend.layouts.search', ['route' => route('facilitie.index')])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable" role="grid" aria-describedby="sampleTable_info">
                                    <thead>
                                        <tr role="row">
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >#</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Group Facilitie</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Name</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Description</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Image</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >Price</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($facilitieDetails as $key => $facilitieDetail)
                                        <tr role="row" class="odd">
                                            <td style="width:5%;">{{ $key + 1 }}</td>
                                            <td style="width:15%;">{{ $facilitieDetail->facilitie->name }}</td>
                                            <td style="width:17%;">{{ $facilitieDetail->name }}</td>
                                            <td style="width:15%;">{{ str_limit($facilitieDetail["description"], 30) }}</td>
                                            <td style="width:20%;">
                                                <img width="100%" src="uploads/images/facilitiedetails/{{ $facilitieDetail->image }}">
                                            </td>
                                            <td style="width:5%;">{{ $facilitieDetail->price }}</td>
                                            <td style="width:20%;">
                                                <a href="backend/facilitie_detail/index/{{ $facilitieDetail->id }}" class="btn btn-info" data-toggle="modal" data-target="#myModa{{ $facilitieDetail->id }}">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{route('facilitie_detail.edit', ['id'=>$facilitieDetail->id])}}" class="btn btn-warning">
                                                    <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                                                </a>
                                                <a
                                                href="{{route('facilitie_detail.destroy', ['id'=>$facilitieDetail->id])}}"
                                                class="btn btn-danger"
                                                onclick="deleteItem({{ $facilitieDetail->id }}, event)"
                                            >
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                            {!!Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['facilitie_detail.destroy',$facilitieDetail->id],
                                                'onsubmit' => 'return confirmDelete()',
                                                'id' => "form-delete-$facilitieDetail->id"
                                            ])!!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @include('backend.facilitie-details.detail')
                                    @endforeach
                                    </tbody>
                                </table>
                                <div style="float: right;">
                                    {{ $facilitieDetails->links() }}
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
    function deleteItem(id,e) {
        e.preventDefault();
        $('#form-delete-' + id).submit();
    }

    function confirmDelete()
    {
        var x = confirm("Are you sure you want to delete?");
        if (x) {
            return true;
        }
        else {
            return false;
        }
    }
</script>
@endpush
