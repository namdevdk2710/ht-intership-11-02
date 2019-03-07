@extends('frontend.layouts.master-page-other')

@section('main')

<div class="section_poolbar_lobby_lounge clearfix">
    <div class="section_accom_content clearfix">
        <div class="row mg0 pd0 clearfix" style="background-color:#eceff6 !important">
            <div class="row-height">
                <div class="col-xs-12 mg0 pd0 pdt20">
                    <div class="line_item_express_page_2"></div>
                    <div id="col1" class="col-xs-6 mg0 pd0">
                        @foreach ($introduces as $key => $introduce)
                        <div class="special_detail_text">
                            <div class="title_contact_text">{{$introduce->name}}</div>
                            <div class="text_desc">
                                <span style="font-size:16px;">
                                    <span style="font-family:roboto_condensedlight;"> {{$introduce->address}}<br />
                                    Điện thoại: {{$introduce->phone}}<br />
                                    Email: {{$introduce->email}}</span></span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div id="col2" class="col-xs-6 mg0 pd0">
                        <div style="padding:15px 15px 0px 0px;">
                            <img src="http://amarinresort.com.vn/templates/website/images/photo/about/contact_google_map.jpg" class="img-responsive" style="width:100%">
                        </div>
                    </div>
                </div>
                <div id="col3" class="col-xs-12 mg0 pd0">
                    @if(Session::has('msg'))
                        <p class="category success" style="text-align:center;" >{{Session::get('msg')}}</p>
                    @endif
                    {{ Form::open(['method' => 'POST', 'route' => 'fe.contact.store']) }}
                    <div class="special_detail_img">
                        <div class="form-group">
                            <div class="col-md-6 pdt10">
                                {{ Form::text('fullname', null, ['class'=>'form-control input-md','placeholder'=>'Họ tên *']) }}
                                @if ($errors->has('fullname'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->get('fullname') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 pdt10">
                                {{ Form::text('email', null, ['class'=>'form-control input-md','placeholder'=>'Email *']) }}
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->get('email') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 pdt10">
                                {{ Form::text('phone', null, ['class'=>'form-control input-md','placeholder'=>'Điện thoại *']) }}
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
                            <div class="col-md-6 pdt10">
                                {{ Form::text('title', null, ['class'=>'form-control input-md','placeholder'=>'Tiêu đề *']) }}
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->get('title') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 pdt10">
                                {{ Form::textarea('content', null, ['class'=>'form-control','placeholder'=>'Nội dung *']) }}
                                @if ($errors->has('content'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->get('content') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                {{ Form::button('<div class="button_booking_bg"></div> <div class="button_booking_text text-center">GỬI</div>', ['type' => 'submit', 'class' => 'btn button_booking'] ) }}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@stop
