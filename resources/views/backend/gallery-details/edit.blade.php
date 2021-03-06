
@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Edit Detail Gallery</h1>
            <p>Form Edit detail gallery</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Gallery Detail</li>
            <li class="breadcrumb-item"><a href="#">Edit</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Edit Galery Detail</h3>
                {!! Form::open(['method' => 'PUT', 'route' => ['gallery_detail.update', $galleryDetail->id],'files' => true]) !!}
                <div class="tile-body">
                    <div class="form-group">
                        {!!Form::label('gallery_id', 'Gallery Group:')!!}
                        {!! Form::select(
                            'gallery_id',
                            $gallery->pluck('name', 'id'),
                            $galleryDetail->gallery_id,
                            ['class' => 'form-control border-input'],
                            ['multiple' => true])
                        !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('name', 'Name', ['class'=>'control-label'])!!}
                        {!!Form::text('name', $galleryDetail->name, ['class'=>'form-control'])!!}
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
                        {!!Form::label('description', 'Description', ['class'=>'control-label'])!!}
                        {!!Form::textarea('description', $galleryDetail->description, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('content', 'Content', ['class'=>'control-label'])!!}
                        {!! Form::textarea('content', $galleryDetail->content, ['class' => 'form-control ckeditor'] ) !!}
                    </div>
                    @if ($errors->has('content'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('name') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                     @endif
                     <div class="form-group">
                        {{ Form::label('image', 'Image', ['for'=>'exampleInputFile']) }}
                        <div>
                          @if(!empty($galleryDetail->image))
                            <img src="uploads/images/gallerydetails/{{ $galleryDetail->image}} " height="150" width="150px" alt="Image galleryDetail" id="img">
                          @else
                            <img src="" width="150" height="150" alt="Image Banner" id="img" style="display: none">
                          @endif
                          <br>
                            <input type="file" id="image" name="image" value="{{ old('image', isset($galleryDetail) ? $galleryDetail->image : '') }}">
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
                </div>
                <div class="tile-footer">
                    {!!Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary'] )!!}
                    <a href="{{route('gallery_detail.index')}}" class="btn btn-secondary"><i
                        class="fa fa-fw fa-lg fa-times-circle"></i>Cancle</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</main>
@endsection
