@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Create Module</h1>
            <p>Form create module</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Module</li>
            <li class="breadcrumb-item"><a href="#">Create</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Create Module</h3>
                {!! Form::open(['method' => 'POST', 'route' => 'module.store','files' => true]) !!}
                <div class="tile-body">
                    <div class="form-group">
                        {!!Form::label('name', 'Name',['class'=>'control-label'])!!}
                        {!!Form::text('name',null,['class'=>'form-control'])!!}
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
                        {!!Form::label('description', 'Description:', ['class'=>'control-label'])!!}
                        {!!Form::textarea('description',null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Image: ', ['class'=>'control-label']) }}
                        <br>
                        <img src="" width="150" height="150" alt="Image Module" id="img" style="display: none">
                        <br>
                        {{ Form::file('image', null, ['class'=>'form-control fileimage']) }}
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
                    {!!Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Create', ['type' => 'submit', 'class' => 'btn btn-primary'] )!!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</main>
@endsection
