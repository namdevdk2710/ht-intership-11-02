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
                        {{ Form::label('name', 'Name:', ['class'=>'control-label']) }}
                        {{ Form::text('name', $banner->name, ['class'=>'form-control']) }}
                    </div>
                    @if ($errors->has('name'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('name') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        {{ Form::label('description', 'Description:', ['class'=>'control-label']) }}
                        {{ Form::textarea('description', $banner->description, ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('avatar', 'Avatar', ['for'=>'exampleInputFile']) }}
                        <div>
                          @if(!empty($banner->image))
                            <img src="uploads/images/banners/{{ $banner->image}} " height="150" width="150px" alt="Image Banner" id="image">
                          @else
                            <img src="" width="150" height="150" alt="Image Banner" id="image" style="display: none">
                          @endif
                          <br>
                            <input type="file" class="fileimage" id="exampleInputFile" name="image" value="{{ old('image', isset($banner) ? $banner->image : '') }}">
                        </div>
                    </div>
                    @if ($errors->has('image'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->get('image') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        {{ Form::label('link', 'Link:', ['class'=>'control-label']) }}
                        {{ Form::text('link', $banner->link, ['class'=>'form-control']) }}
                    </div>
                    @if ($errors->has('link'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->get('link') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif
                </div>
                <div class="tile-footer">
                    {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update', ['type' => 'submit',
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
