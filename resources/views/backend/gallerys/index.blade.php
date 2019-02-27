@extends('backend.layouts.master')

@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-th-list"></i> List Gallerys
            </h1>
            <p>Display all lists gallerys</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">admin</li>
            <li class="breadcrumb-item active"><a href="#">gallery</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <a class="btn btn-primary icon-btn" href="{{route('gallery.create')}}">
                                    <i class="fa fa-plus"></i>Create gallery
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="sampleTable_filter" class="dataTables_filter">
                                    <label>
                                        Search:
                                        <input
                                            type="search"
                                            class="form-control form-control-sm"
                                            aria-controls="sampleTable"
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable" role="grid" aria-describedby="sampleTable_info">
                                    <thead>
                                        <tr role="row">
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 154px;">#</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 254px;">Name</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 107px;">Description</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 51px;">Image</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 91px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($gallerys as $key => $gallery)
                                        <tr role="row" class="odd">
                                            <td style="width:5%;">{{ $key + 1 }}</td>
                                            <td style="width:17%;">{{ $gallery->name }}</td>
                                            <td style="width:40%;">{{ str_limit($gallery["description"], 50) }}</td>
                                            <td>
                                                <img width="50%" src="uploads/images/gallerys/{{ $gallery->image }}">
                                            </td>
                                            <td style="width:17%;">
                                                <a href="backend/gallerys/index/{{ $gallery->id }}" class="btn btn-info" data-toggle="modal" data-target="#myModa{{ $gallery->id }}">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{route('gallery.edit', ['id'=>$gallery->id])}}" class="btn btn-warning">
                                                    <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                                                </a>
                                                <a
                                                href="{{route('gallery.destroy', ['id'=>$gallery->id])}}"
                                                class="btn btn-danger btn-delete"
                                                onclick=""
                                                >
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                                {!!Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['gallery.destroy',$gallery->id],
                                                    'onsubmit' => 'return confirmDelete()',
                                                    'id' => 'form-delete'
                                                ])!!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @include('backend.gallerys.detail') @endforeach
                                    </tbody>
                                </table>
                                <div style="float: right;">
                                    {{ $gallerys->links() }}
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
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        $('#form-delete').submit();
    });

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
