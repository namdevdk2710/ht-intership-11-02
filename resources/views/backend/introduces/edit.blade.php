@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-edit"></i> Edit Introduce
            </h1>
            <p>Form Edit Introduce</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="fa fa-home fa-lg"></i>
            </li>
            <li class="breadcrumb-item">Introduces</li>
            <li class="breadcrumb-item">
                <a href="{{route('introduce.index')}}">Edit Introduce </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('introduce.edit', ['id'=>$introduce->id])}}">{{ $introduce->name }} </a>
            </li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Form Edit Introduce</h3>
            <div class="tile-body">
                {{ Form::open(['method' => 'PUT', 'route' => ['introduce.update', $introduce->id]]) }}
                <div class="tile-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Name:', ['class'=>'control-label']) }}
                        {{ Form::text('name', $introduce->name, ['class'=>'form-control']) }}
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
                        {{ Form::label('address', 'Address:', ['class'=>'control-label']) }}
                        {{ Form::text('address', $introduce->address, ['class'=>'form-control']) }}
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
                        {{ Form::label('email', 'Email:', ['class'=>'control-label']) }}
                        {{ Form::email('email', $introduce->email, ['class'=>'form-control']) }}
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
                        {{ Form::label('phone', 'Phone:', ['class'=>'control-label']) }}
                        {{ Form::tel('phone', $introduce->phone, ['class'=>'form-control']) }}
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
                    {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update',
                    ['type' => 'submit', 'class' => 'btn btn-primary'] ) }} &nbsp;&nbsp;&nbsp;
                    <a href="{{route('introduce.index')}}" class="btn btn-secondary">
                        <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancle
                    </a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</main>
@endsection
