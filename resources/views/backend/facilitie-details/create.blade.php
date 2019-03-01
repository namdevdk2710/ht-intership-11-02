@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Create Facilitie Detail</h1>
            <p>Form create facilitie detail</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Facilitie Detail</li>
            <li class="breadcrumb-item"><a href="#">Create</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Create Facilitie Detail</h3>
                {{ Form::open(['method' => 'POST', 'route' => 'facilitie_detail.store', 'files' => true]) }}
                <div class="tile-body">
                    <div class="form-group">
                        {{ Form::label('facilitie_id', 'Facilitie Group:') }}
                        {{  Form::select(
                            'facilitie_id',
                            $facilitieDetails->pluck('name', 'id'),
                            null,
                            ['class' => 'form-control border-input'],
                            ['multiple' => true])
                         }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('name', 'Name', ['class'=>'control-label']) }}
                        {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Import Name']) }}
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
                        {{ Form::label('description', 'Description', ['class'=>'control-label']) }}
                        {{ Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Import Description']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('content', 'Content', ['class'=>'control-label']) }}
                        {{  Form::textarea('content', null, ['class' => 'form-control ckeditor', 'placeholder'=>'Import Content'] )  }}
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
                    <div class="input-group"">
                        {{ Form::label('price', 'Price:', ['class'=>'control-label']) }}
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                            {{ Form::number('price', null, ['class'=>'form-control', 'id'=>'exampleInputAmount', 'placeholder'=>'Import Price']) }}
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
                        {{ Form::label('image', 'Image: ', ['class'=>'control-label']) }}
                        <br>
                        <img src="" width="150" height="150" alt="Image Facilitie Detail" id="img" style="display: none">
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
                    {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Create', ['type' => 'submit', 'class' => 'btn btn-primary'] ) }}
                </div>
                {{  Form::close()  }}
            </div>
        </div>
    </div>
</main>
@endsection
