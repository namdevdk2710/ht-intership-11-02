@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-edit"></i>
                Edit Module
            </h1>
            <p>Form Edit Module</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="fa fa-home fa-lg"></i>
            </li>
            <li class="breadcrumb-item">Modules</li>
            <li class="breadcrumb-item">
                <a href="#">Edit Module </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">{{ $module->name }} </a>
            </li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Form Edit Module</h3>
            <div class="tile-body">
                {{ Form::open(['method' => 'PUT', 'route' => ['module.update', $module->id],'files' => true]) }}
                <div class="tile-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Name:', ['class'=>'control-label']) }}
                        {{ Form::text('name', $module->name, ['class'=>'form-control']) }}
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
                        {{ Form::textarea('description', $module->description, ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Image', ['for'=>'exampleInputFile']) }}
                        <div>
                          @if(!empty($module->image))
                            <img src="uploads/images/modules/{{ $module->image}} " height="150" width="150px" alt="Image module" id="img">
                          @else
                            <img src="" width="150" height="150" alt="Image Module" id="img" style="display: none">
                          @endif
                          <br>
                            <input type="file" id="image" name="image" value="{{ old('image', isset($module) ? $module->image : '') }}">
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
                    <div class="input-group input-group-sm">
                        {{ Form::label('status','Status:') }}
                        <div class="form-check">
                            @if ($module->status == '1')
                                <label style="padding-left:25px;">
                                    {{ Form::radio('status','1',true) }} Kích hoạt
                                </label>
                                <label style="padding-left:25px;">
                                    {{ Form::radio('status','0',false) }} Tắt kích hoạt
                                </label>
                             @else
                                <label style="padding-left:25px;">
                                    {{ Form::radio('status','1',false) }} Kích hoạt
                                </label>
                                <label style="padding-left:25px;">
                                    {{ Form::radio('status','0',true) }} Tắt kích hoạt
                                </label>
                            @endif
                        </div>
                    </div>
                    @if ($errors->has('status'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('status') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="tile-footer">
                    {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update', ['type' => 'submit',
                    'class' => 'btn btn-primary'] ) }} &nbsp;&nbsp;&nbsp;
                    <a href="{{route('module.index')}}" class="btn btn-secondary"><i
                            class="fa fa-fw fa-lg fa-times-circle"></i>Cancle</a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</main>
@endsection
