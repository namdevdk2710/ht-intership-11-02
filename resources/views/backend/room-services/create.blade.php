@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Create Room Service </h1>
            <p>Form create Room Service </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Room Service </li>
            <li class="breadcrumb-item"><a href="#">Create</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Create Room Service </h3>
                {{ Form::open(['method' => 'POST', 'route' => 'room_service.store', 'files' => true]) }}
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
                            {{ Form::label('description', 'Description:', ['class'=>'control-label']) }}
                            {{ Form::textarea('description','',['class'=>'form-control','placeholder'=>'Import Description']) }}
                    </div>
                    @if ($errors->has('description'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('description') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        {{ Form::label('icon', 'Icon: ', ['class'=>'control-label']) }}
                        <br>
                        <img src="" width="34" height="30" alt="Icon Room Service" id="avt" style="display: none">
                        <br>
                        {{ Form::file('icon', null, ['class'=>'form-control']) }}
                        <p>( Vui lòng chọn ảnh đúng kích thước icon 34 x 30.... ) </p>
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
            $("#icon").change(function() {
                readURL(this);
            });
        });
    </script>
@endpush
