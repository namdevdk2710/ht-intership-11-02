@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Create User </h1>
            <p>Form create user </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">User </li>
            <li class="breadcrumb-item"><a href="#">Create</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Create User </h3>
                {{ Form::open(['method' => 'POST', 'route' => 'user.store', 'files' => true]) }}
                <div class="tile-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Name:', ['class'=>'control-label']) }}
                        <span style="color:red;">*</span>
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
                        {{ Form::label('password', 'Password:', ['class'=>'control-label','for'=>'exampleInputPassword1']) }}
                        <span style="color:red;">*</span>
                        {{ Form::password('password',['class'=>'form-control','placeholder'=>'Import Password']) }}
                    </div>
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('password') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        {{ Form::label('retypePassword', 'Retype Password:', ['class'=>'control-label','for'=>'exampleInputPassword1']) }}
                        <span style="color:red;">*</span>
                        {{ Form::password('passwordAgain',['class'=>'form-control','placeholder'=>'Retype Password']) }}
                    </div>
                    @if ($errors->has('passwordAgain'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('passwordAgain') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                            {{ Form::label('phone', 'Phone:', ['class'=>'control-label']) }}
                            {{ Form::number('phone','',['class'=>'form-control','placeholder'=>'Import Phone']) }}
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
                    <div class="form-group">
                            {{ Form::label('email', 'Email:', ['class'=>'control-label']) }}
                            <span style="color:red;">*</span>
                            {{ Form::email('email','',['class'=>'form-control','placeholder'=>'Import Email']) }}
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
                        {{ Form::label('address', 'Address:', ['class'=>'control-label']) }}
                        {{ Form::text('address', null, ['class'=>'form-control', 'placeholder'=>'Import address']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('avatar', 'Avatar: ', ['class'=>'control-label']) }}
                        <br>
                        <img src="" width="150" height="150" alt="Avatar User" id="avt" style="display: none">
                        <br>
                        {{ Form::file('avatar', null, ['class'=>'form-control']) }}
                    </div>
                    @if ($errors->has('avatar'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->get('avatar') as $error)
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

@push('script')
    <script>
        $("div.alert-success").delay(4000).slideUp();

        $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#avt').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#avatar").change(function() {
                readURL(this);
            });
        });
    </script>
@endpush
