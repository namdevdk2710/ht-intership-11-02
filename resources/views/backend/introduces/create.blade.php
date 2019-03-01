@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Create Introduce</h1>
            <p>Form Create Introduce</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Introduce</li>
            <li class="breadcrumb-item"><a href="#">Create Introduce</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Create Introduce</h3>
                {{ Form::open(['method' => 'POST', 'route' => 'introduce.store','files' => true]) }}
                <div class="tile-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Name: ', ['class'=>'control-label']) }}
                        {{ Form::text('name', null, ['class'=>'form-control']) }}
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
                        {{ Form::label('address', 'Address: ', ['class'=>'control-label']) }}
                        {{ Form::text('address', null, ['class'=>'form-control']) }}
                    </div>
                    @if ($errors->has('address'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('address') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        {{ Form::label('email', 'Email: ', ['class'=>'control-label']) }}
                        {{ Form::email('email', null, ['class'=>'form-control']) }}
                    </div>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('email') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        {{ Form::label('phone', 'Phone: ', ['class'=>'control-label']) }}
                        {{ Form::tel('phone', null, ['class'=>'form-control']) }}
                    </div>
                    @if ($errors->has('phone'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('phone') as $error)
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

