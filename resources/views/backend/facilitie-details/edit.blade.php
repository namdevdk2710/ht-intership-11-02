
@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Edit Detail Facilitie</h1>
            <p>Form Edit detail facilitie</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Facilitie Detail</li>
            <li class="breadcrumb-item"><a href="#">Edit</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Edit Facilitie Detail</h3>
                {!! Form::open(['method' => 'PUT', 'route' => ['facilitie_detail.update', $facilitieDetail->id],'files' => true]) !!}
                <div class="tile-body">
                    <div class="form-group">
                        {!!Form::label('facilitie_id', 'Facilitie Group:')!!}
                        {!! Form::select(
                            'facilitie_id',
                            $facilitie->pluck('name', 'id'),
                            $facilitieDetail->facilitie_id,
                            ['class' => 'form-control border-input'],
                            ['multiple' => true])
                        !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('name', 'Name:', ['class'=>'control-label']) }}
                        {{ Form::text('name', $facilitieDetail->name, ['class'=>'form-control', 'placeholder'=>'Import Name']) }}
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
                        {{ Form::textarea('description', $facilitieDetail->description, ['class'=>'form-control', 'placeholder'=>'Import Description']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('content', 'Content:', ['class'=>'control-label']) }}
                        {{  Form::textarea('content', $facilitieDetail->content, ['class' => 'form-control ckeditor', 'placeholder'=>'Import Content'] )  }}
                    </div>
                    @if ($errors->has('content'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('content') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="input-group">
                        {{ Form::label('price', 'Price:', ['class'=>'control-label']) }}
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                            {{ Form::number('price',explode('.',$facilitieDetail->price)[0] , ['class'=>'form-control','id'=>'exampleInputAmount', 'placeholder'=>'Import Price']) }}
                        <div class="input-group-append"><span class="input-group-text">.000</span></div>
                    </div>
                    @if ($errors->has('price'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('price') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        {{ Form::label('image', 'Image', ['for'=>'exampleInputFile']) }}
                        <div>
                            @if(!empty($facilitieDetail->image))
                                <img src="uploads/images/facilitiedetails/{{ $facilitieDetail->image}} " height="150" width="150px" alt="Image Facilitie Detail" id="img">
                            @else
                                <img src="" width="150" height="150" alt="Image Facilitie Detail" id="img" style="display: none">
                            @endif
                            <br>
                            <input type="file" id="image" name="image" value="{{ old('image', isset($facilitieDetail) ? $facilitieDetail->image : '') }}">
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
                    <a href="{{route('facilitie_detail.index')}}" class="btn btn-secondary"><i
                        class="fa fa-fw fa-lg fa-times-circle"></i>Cancle</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</main>
@endsection
