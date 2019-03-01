@extends('backend.layouts.master')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-edit"></i> Edit Facilitie
            </h1>
            <p>Form Edit Facilitie</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="fa fa-home fa-lg"></i>
            </li>
            <li class="breadcrumb-item">Facilities</li>
            <li class="breadcrumb-item">
                <a href="{{route('facilitie.index')}}">Edit Facilitie </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('facilitie.edit', ['id'=>$facilitie->id])}}">{{ $facilitie->name }} </a>
            </li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Form Edit Facilitie</h3>
            <div class="tile-body">
                {{ Form::open(['method' => 'PUT', 'route' => ['facilitie.update', $facilitie->id],'files' => true]) }}
                <div class="tile-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Name:', ['class'=>'control-label']) }}
                        {{ Form::text('name', $facilitie->name, ['class'=>'form-control']) }}
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
                        {{ Form::textarea('description', $facilitie->description, ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="tile-footer">
                    {{ Form::button('<i class="fa fa-fw fa-lg fa-check-circle"></i> Update',
                    ['type' => 'submit', 'class' => 'btn btn-primary'] ) }} &nbsp;&nbsp;&nbsp;
                    <a href="{{route('facilitie.index')}}" class="btn btn-secondary">
                        <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancle
                    </a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</main>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".fileimage").change(function() {
            readURL(this);
        });
    });
</script>
@endpush
