@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Edit Room Service</h1>
            <p>Form Edit Room Service</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Room Service</li>
            <li class="breadcrumb-item"><a href="#">Edit</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Edit Room Service</h3>
                {!! Form::open(['method' => 'PUT', 'route' => ['room_service.update', $roomservice->id],'files' => true]) !!}
                <div class="tile-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Name:', ['class'=>'control-label']) }}
                        <span style="color:red;">*</span>
                        {{ Form::text('name', $roomservice->name, ['class'=>'form-control', 'placeholder'=>'Import Name']) }}
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
                            {{ Form::textarea('description',$roomservice->description,['class'=>'form-control','placeholder'=>'Import Description']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('icon', 'Icon', ['for'=>'exampleInputFile']) }}
                        <div>
                            @if(!empty($roomservice->icon))
                                <img src="uploads/images/roomservices/{{ $roomservice->icon}} " height="34" width="30" alt="icon" id="img">
                            @else
                                <img src="" width="34" height="30" alt="Avatar User" id="img" style="display: none">
                            @endif
                            <br>
                            <input type="file" id="image" name="icon" value="{{ old('icon', isset($roomservice) ? $roomservice->icon : '') }}">
                        </div>
                    </div>
                    @if ($errors->has('icon'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->get('icon') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif
                </div>
                <div class="tile-footer">
                    {!!Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary'] )!!}
                    <a href="{{ route('room_service.index') }}" class="btn btn-secondary"><i
                        class="fa fa-fw fa-lg fa-times-circle"></i>Cancle</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</main>
@endsection
