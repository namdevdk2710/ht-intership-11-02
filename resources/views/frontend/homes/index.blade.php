@extends('frontend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('../frontend/css/onepage-scroll.1.3.1.css')}}">
    <link rel="stylesheet" href="{{asset('../frontend/css/style.default.css')}}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{asset('../frontend/css/video-default.css')}}">
@stop
@section('main')

<div class="wrapper">
    <div class="main">
        <!-- page 1-->
        <section id="page1">
            <div id="mycarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#mycarousel" data-slide-to="1"></li>
                </ul>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach ($banners as $banner)
                    <div class="item moving">
                        <img src="../uploads/images/banners/{{ $banner->image }}">
                        <div class="carousel-caption">
                            <div class="item_content_desc_home" data-animation="animated fadeInUp">
                                <div class="line_item_express"></div>
                                <div class="slide_desc text_desc">{{ $banner->description }}</div>
                                <div class="slide_btn">
                                    <div class="button_affect">
                                        <span id="draw_lp_left"></span>
                                        <span id="draw_lp_bottom"></span>
                                        <span id="draw_lp_top" class="lp_top"></span>
                                        <span id="draw_lp_right"></span>
                                        <a href="{{ asset('/') }}" target="_blank" style="font-size:7pt">CHI TIẾT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- page 2-->
        <section id="page2">
            <div class="line_item_express_page_2"></div>
            <div class="content content_p2">
                @foreach ($abouts as $key => $about)
                <a href="{{ route('fe.about.detail_about', ['slug'=>str_slug($about->name), 'id'=>$about->id]) }}">
                    <div class="row clearfix content_p2_row {{$key % 2 == 0 ?'':'top50'}}">
                        <div class="col-xs-6 item_pading content_p2_col_6
                            {{$key % 2 == 0 ?
                            'scrolling-item slideLeft':
                            'float_text_right scrolling-item-2 slideRight animated fadeInRight'}}">
                            <div class="item-container-fluid">
                                <div class="item-row-fluid">
                                    <div class="{{$key % 2 == 0 ?'item_contain_right':'item_contain_left'}}">
                                        <p class="{{$key % 2 == 0 ?'text-right':'text-left'}}">
                                            <span class="color_yellow_cu">{{$about->name}}</span>
                                        </p>
                                        <p class="text_desc">
                                            {{str_limit($about["description"], 250)}}
                                        </p>
                                        <div style="width:100%;{{$key % 2 == 0 ?'text-align:right;padding-right:2px;':'text-align:center;padding-left:2px;'}}">
                                            <div class="button_affect" style="{{$key % 2 == 0 ?'float:right':''}}">
                                                <span id="draw_lp_left"></span>
                                                <span id="draw_lp_bottom"></span>
                                                <span id="draw_lp_top" class="lp_top"></span>
                                                <span id="draw_lp_right"></span> CHI TIẾT
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 item_pading content_p2_col_6 {{$key % 2 == 0 ?
                            'scrolling-item-1 slideRight':
                            ' float_image_left scrolling-item-2 slideLeft animated fadeInLeft'}}"
                            style="background-image:url(../uploads/images/abouts/{{$about->image}});background-repeat:no-repeat;background-position:right center;background-size:cover;"
                        >
                            <div class="img-desc-home">
                                <img src="../uploads/images/abouts/{{$about->image}}" alt="" style="width:100%">
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </section>
        <!-- page 3 -->
        <section id="page3">
            <div class="content content_p3">
                <div class="line_item_express_page_3"></div>
                <div class="container_page3">
                    @foreach ($destinations as $key => $destination)
                    <div class="row clearfix content_p3_row scrolling-item">
                        <div class="col-xs-6 item_pading float_text_right content_p3_col_6">
                            <div class="item-container-fluid">
                                <div class="item-row-fluid">
                                    <div class="item_contain_left bg_none">
                                        <a href="{{ asset('/destination') }}">
                                            <p class="text-left">
                                                <span class="color_yellow_cu">{{$destination->name}}</span>
                                            </p>
                                            <p class="text_desc">
                                                {{str_limit($destination["description"], 250)}}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-xs-6 item_pading float_image_left content_p3_col_6"
                            style="background-image:url(../uploads/images/destinations/{{$destination->image}});background-repeat:no-repeat;background-position:left center;background-size:cover;"
                        >
                            <div class="img-desc-home-p3">
                                <img src="../uploads/images/destinations/{{$destination->image}}" alt="" style="width:100%">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach ($offers as $key => $offer)
                    <a href="{{route('fe.offer.detail', ['slug'=>str_slug($offer->name), 'id'=>$offer->id])}}">
                        <div class="row clearfix content_p3_row top33 scrolling-item-1">
                            <div class="col-xs-6 item_pading content_p3_col_6">
                                <div class="item-container-fluid">
                                    <div class="item-row-fluid">
                                        <div class="item_contain_right bg_none">
                                            <p class="text-right">
                                                <span class="color_yellow_cu">{{$offer->name}}</span>
                                            </p>
                                            <p class="text_desc">
                                                {{str_limit($offer["description"], 250)}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xs-6 item_pading content_p3_col_6"
                                style="background-image:url(../uploads/images/offers/{{$offer->image}});background-repeat:no-repeat;background-position:right center;background-size:cover;"
                            >
                                <div class="img-desc-home-p3">
                                    <img src="../uploads/images/offers/{{$offer->image}}" alt="" style="width:100%">
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    @foreach ($facilitieDetails as $key => $facilitieDetail)
                    <a href="{{ asset('/facilitie') }}">
                        <div class="row clearfix content_p3_row top66 scrolling-item-2">
                            <div class="col-xs-6 item_pading float_text_right content_p3_col_6">
                                <div class="item-container-fluid">
                                    <div class="item-row-fluid">
                                        <div class="item_contain_left bg_none">
                                            <p class="text-left">
                                            <span class="color_yellow_cu">{{$facilitieDetail->name}}</span>
                                            </p>
                                            <p class="text_desc">
                                                {{str_limit($facilitieDetail["content"], 250)}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xs-6 item_pading float_image_left content_p3_col_6"
                                style="background-image:url(../uploads/images/facilitiedetails/{{$facilitieDetail->image}});background-repeat:no-repeat;background-position:left center;background-size:cover;"
                            >
                                <div class="img-desc-home-p3">
                                    <img src="../uploads/images/facilitiedetails/{{$facilitieDetail->image}}" alt="" style="width:100%">
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- page 4 - class section-gray adds gray background-->
        <section id="page4">
            <div class="container_page4 clearfix text-center scrolling-item" style="height:75%;">
                <div class="item-container-fluid">
                    <div class="item-row-fluid">
                        <div class="row thumbnail video_player clearfix">
                            <img src="{{ asset('../frontend/images/photo_temp_video.png') }}" style="width:100%;height:auto">
                        </div>
                        <div class="row clearfix" style="width:330px;height:auto;margin:0 auto">
                            <a href="{{ asset('/bookroom') }}">
                                <div class="button_video" style="float:left;margin-right:10px">
                                    <div class="button_video_bg"></div>
                                    <div class="button_video_text">ĐẶT PHÒNG</div>
                                </div>
                            </a>
                            <div class="button_video" style="float:left">
                                <div class="button_video_bg"></div>
                                <div class="button_video_text">TẢI BROCHURE</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section_footer_as clearfix scrolling-item" style="margin-top: -4em;">
                <div class="row copyright mg0">
                    <div class="col-md-3 text-left">
                        <div class="footer_logo">
                            <a href="{{ asset('/') }}">
                                <img class="img-responsive" src="{{ asset('../frontend/images/logo_grey.png') }}" />
                            </a>
                        </div>
                    </div>
                    @foreach ($introduces as $key => $introduce)
                    <div class="col-md-3 text-left">
                        <div class="footer_logo text_foter">
                            <span class="text_foter_header">
                                {{$introduce->name}}
                            </span>
                            <br/>
                            <span>
                                <span style="font-size:16px;">
                                    <span style="font-family:roboto_condensedlight;">
                                        {{$introduce->address}}<br />
                                        Điện thoại: {{$introduce->phone}}<br />
                                        Email: {{$introduce->email}}
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-3 mg0 pd0">
                        <div class="footer_logo">
                            <div class="text-center clearfix">
                                <div class="social_text">KẾT NỐI VỚI&nbsp;
                                    <a href="#" target="_blank">
                                         <img src="{{ asset('../frontend/icon_social/facebook.png') }}" alt="Facebook" title="Facebook" />
                                    </a>
                                    <a href="#">
                                        <img src="{{ asset('../frontend/icon_social/google.png') }}" alt="Google" title="Google" />
                                    </a>
                                    <a href="#">
                                        <img src="{{ asset('../frontend/icon_social/instagram.png') }}" alt="Instagram" title="Instagram" />
                                    </a>
                                </div>
                            </div>
                            <div class="text-center clearfix">
                                <div class="icon_bottom_menu_ward">
                                    <img src="{{ asset('../frontend/images/icon_menu.png') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix menu_footer text-center" style="padding-bottom:5px;width:100%;clear:both">
                        <a href="{{ asset('/') }}">VỀ AMARIN</a>
                        <span>|</span>
                        <a href="{{ asset('/accommodation') }}">PHÒNG</a>
                        <span>|</span> <a href="{{ asset('/gallery') }}">THƯ VIỆN</a>
                        <span>|</span><a href="{{ asset('/facilitie') }}">TIỆN ÍCH</a>
                        <span>|</span> <a href="{{ asset('/contact') }}">LIÊN HỆ</a>
                    </div>
                    <div class="clearfix pull-left" style="padding-top:5px;width:100%;text-align:center;background-color:#c1c6cf">
                        <p class="text_foter">
                            © 2016 Amarin Resort Phu Quoc Island. All rights reserved<br/> Developed by Media Gurus
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- Javascript files-->
<script src="{{asset('frontend/js/respond.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.popupoverlay.js')}}"></script>
<script src="{{asset('frontend/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.cookie.js')}}"></script>
<script src="{{asset('frontend/js/jquery.onepage-scroll.1.3.1.js')}}"></script>
<script src="{{asset('frontend/js/front.js')}}"></script>
</body>

</html>

@stop
