@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Edit User</h1>
            <p>Form Edit user</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item"><a href="#">Edit</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Edit User</h3>
                {!! Form::open(['method' => 'PUT', 'route' => ['user.update', $user->id],'files' => true]) !!}
                    <div class="tile-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Name:', ['class'=>'control-label']) }}
                            <span style="color:red;">*</span>
                            {{ Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Import Name']) }}
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
                            {{ Form::checkbox('changePassword','',false,['class'=>'changePassword']) }}
                            {{ Form::label('password','Password') }}<span style="color:red;">*</span>
                            {{ Form::password('password',['class'=>'form-control password','placeholder'=>'Import Password','disabled'=>'']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::password('passwordAgain',['class'=>'form-control password','placeholder'=>'Retype Password','disabled'=>'']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone:', ['class'=>'control-label']) }}
                            {{ Form::number('phone', $user->phone,['class'=>'form-control','placeholder'=>'Import Phone']) }}
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
                                {{ Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'Import Email']) }}
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
                            {{ Form::text('address', $user->address, ['class'=>'form-control', 'placeholder'=>'Import address']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('avatar', 'Avatar', ['for'=>'exampleInputFile']) }}
                            <div>
                                @if(!empty($user->avatar))
                                    <img src="uploads/images/users/{{ $user->avatar}} " height="150" width="150px" alt="Avatar User" id="img">
                                @else
                                    <img src="" width="150" height="150" alt="Avatar User" id="img" style="display: none">
                                @endif
                                <br>
                                <input type="file" id="image" name="avatar" value="{{ old('avatar', isset($user) ? $user->avatar : '') }}">
                            </div>
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
                    {!!Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update', ['type' => 'submit', 'class' => 'btn btn-primary'] )!!}
                    <a href="{{ route('user.index') }}" class="btn btn-secondary"><i
                        class="fa fa-fw fa-lg fa-times-circle"></i>Cancle</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</main>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $(".changePassword").change(function () {
            var parent = $( this ).parent();
            var next = parent.next();
            var child = next.children( "input[name='passwordAgain']" )
                if ($(this).is(":checked")) {
                $(this).siblings("input[name='password'], input[name='passwordAgain']").removeAttr('disabled');
                child.removeAttr('disabled');
                }
                else {
                $(this).siblings("input[name='password'], input[name='passwordAgain']").attr('disabled','');
                child.attr('disabled','');
                }
            });
        });
    </script>
@endpush
