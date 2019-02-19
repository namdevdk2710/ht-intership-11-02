@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
        <section class="content-header">
          <h1>
            Create Destinations
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                {{ Form::open(['url'=>'admin/home']) }}
                  <div class="box-body">
                    <div class="form-group">
                      {{ Form::label('lblname','Name') }}
                      {{ Form::text('name', '',['class' => 'form-control','placeholder'=>'Nhập tên điểm đến'])}}
                    </div>
                    <div class="form-group">
                     {{ Form::label('lblimages','Images')}}
                     {{ Form::file('images',['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('lbldescriptions','Description')}}
                        {{Form::textarea('description','',['class' => 'form-control','rows' => '3', 'id' => 'demo'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('lblcontent','Content')}}
                        {{Form::textarea('content','',['class' => 'form-control ckeditor','rows' => '3', 'id' => 'demo'])}}
                    </div>
                    <div class="box-footer">
                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                        <a href="" class="btn btn-warning" style="margin-left: 30px;">Cancel</a>
                    </div>
                  </div>
                {{ Form::close() }}
              </div>
            </div>
          </div>
        </section>
        <script>
        </script>
</div>
@endsection
