@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-edit"></i>
                Edit Banner
            </h1>
            <p>Form Edit Banner</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="fa fa-home fa-lg"></i>
            </li>
            <li class="breadcrumb-item">Banners</li>
            <li class="breadcrumb-item">
                <a href="#">Edit Banner </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">{{ $banner->name }} </a>
            </li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Form Edit Banner</h3>
            <div class="tile-body">
                {{ Form::open(['method' => 'PUT', 'route' => ['banner.update', $banner->id],'files' => true]) }}
                <div class="tile-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Name:',['class'=>'control-label']) }}
                        {{ Form::text('name',$banner->name,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description:',['class'=>'control-label']) }}
                        {{ Form::textarea('description',$banner->description,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('image','Image:') }}<br>
                            @if(!empty($banner->image))
                            <img src="{{ $banner->image }}" height="150" width="150px" alt="Ảnh đại diện" id="">
                            @else
                            <img src="" width="150" height="150" alt="Ảnh đại diện" id="avatarup" style="display: none">
                            @endif
                            <br>
                            <br>
                        {{ Form::file('image',['class'=>'fileimage']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('link', 'Link:',['class'=>'control-label']) }}
                        {{ Form::text('link',null,['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="tile-footer">
                    {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Create', ['type' => 'submit',
                    'class' => 'btn btn-primary'] ) }} &nbsp;&nbsp;&nbsp;
                    <a href="{{route('banner.index')}}" class="btn btn-secondary"><i
                            class="fa fa-fw fa-lg fa-times-circle"></i>Cancle</a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
@parent
<script>
    $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".fileimage").change(function () {
            readURL(this);
        });
    });
</script>
@endsection
