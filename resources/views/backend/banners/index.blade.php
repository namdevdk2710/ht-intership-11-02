@extends('backend.layouts.master')

@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-th-list"></i> List Banners
            </h1>
            <p>Display all lists banners</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">admin</li>
            <li class="breadcrumb-item active"><a href="#">banner</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <a class="btn btn-primary icon-btn" href="">
                                    <i class="fa fa-plus"></i>Create Banner
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
                                <table
                                    class="table table-hover table-bordered dataTable no-footer"
                                    id="sampleTable"
                                    role="grid"
                                    aria-describedby="sampleTable_info"
                                >
                                    <thead>
                                        <tr role="row">
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1"
                                                aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 154px;">#</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 254px;">Name</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1"
                                                aria-label="Office: activate to sort column ascending"
                                                style="width: 107px;">Description</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1"
                                                aria-label="Age: activate to sort column ascending"
                                                style="width: 51px;">Image</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 91px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($banners as $key => $baner)
                                        <tr role="row" class="odd">
                                            <td style="width:5%;">{{ $key + 1 }}</td>
                                            <td style="width:17%;">{{ $baner->name }}</td>
                                            <td style="width:40%;">{{ str_limit($baner["description"], 50) }}</td>
                                            <td>
                                                @if(!empty($baner->image))
                                                    <img width="100%" src="{{$baner->image}}">
                                                @endif
                                            </td>
                                            <td style="width:17%;">
                                                <a href="backend/banners/index/{{ $baner->id }}" class="btn btn-info" data-toggle="modal" data-target="#myModa{{ $baner->id }}">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{route('banner.edit', ['id'=>$baner->id])}}" class="btn btn-warning">
                                                    <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @include('backend.banners.detail')
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="float: right;">
                                    {{ $banners->links() }}
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
