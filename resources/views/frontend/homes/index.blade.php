@extends('frontend.layouts.master') @section('main')
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
                                    <a href="{{ $banner->link }}" target="_blank" style="font-size:7pt">CHI TIẾT</a>
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
            <a href="{{$about->slug}}">
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
                        style="background-image:url(../uploads/images/abouts/{{$about->image}});background-repeat:no-repeat;background-position:right center;background-size:cover;">
                        <div class="img-desc-home"><img src="../uploads/images/abouts/{{$about->image}}" alt="" style="width:100%"></div>
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
                <div class="row clearfix content_p3_row scrolling-item">
                    <div class="col-xs-6 item_pading float_text_right content_p3_col_6">
                        <div class="item-container-fluid">
                            <div class="item-row-fluid">
                                <div class="item_contain_left bg_none">
                                    <a href="vn/welcome/destination/kham-pha-cac-hon-dao.html">
                                        <p class="text-left">
                                            <span class="color_yellow_cu">KHÁM PHÁ CÁC HÒN ĐẢO</span>
                                        </p>
                                        <p class="text_desc">
                                            Đến Phú Quốc, người đam mê du lịch khám phá không thể nào bỏ qua Bãi Sao – bãi biển đẹp nhất đảo có chiều dài hơn bảy cây số, với dáng cong cong, thoai thoải hình mảnh trăng khuyết... </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 item_pading float_image_left content_p3_col_6" style="background-image:url(frontend/images/UploadImages//news/BAI_SAO_800X300.jpg);background-repeat:no-repeat;background-position:left center;background-size:cover;">
                        <div class="img-desc-home-p3"><img src="frontend/images/UploadImages//news/BAI_SAO_800X300.jpg" alt="" style="width:100%"></div>
                    </div>
                </div>
                <a href="vn/special-offers.html">
                    <div class="row clearfix content_p3_row top33 scrolling-item-1">
                        <div class="col-xs-6 item_pading content_p3_col_6">
                            <div class="item-container-fluid">
                                <div class="item-row-fluid">
                                    <div class="item_contain_right bg_none">
                                        <p class="text-right">
                                            <span class="color_yellow_cu">FAMILY PACKAGE</span>
                                        </p>
                                        <p class="text_desc">
                                            Phú Quốc được mệnh danh là vẻ đẹp thiên đường nhiệt đới, bất tận và quyến rũ, tất cả có ngay tại Amarin Resort Phú Quốc! Tận hưởng trọn gói ưu đãi gồm kỳ nghỉ 03 ngày 02 đêm&#8230; </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 item_pading content_p3_col_6" style="background-image:url(frontend/images/UploadImages//special/family_package_P1.jpg);background-repeat:no-repeat;background-position:right center;background-size:cover;">
                            <div class="img-desc-home-p3"><img src="frontend/images/UploadImages//special/family_package_P1.jpg" alt="" style="width:100%"></div>
                        </div>
                    </div>
                </a>
                <a href="vn/facilities.html">
                    <div class="row clearfix content_p3_row top66 scrolling-item-2">
                        <div class="col-xs-6 item_pading float_text_right content_p3_col_6">
                            <div class="item-container-fluid">
                                <div class="item-row-fluid">
                                    <div class="item_contain_left bg_none">
                                        <p class="text-left">
                                            <span class="color_yellow_cu">TIỆC CƯỚI</span>
                                        </p>
                                        <p class="text_desc">
                                            Một đám cưới bên cạnh biển xanh tràn ngập ánh nắng là điều mơ ước của nhiều cặp đôi trong ngày trọng đại của cuộc đời. Amarin Resort với lợi thế bãi biển, cảnh quan thiên nhiên đi đôi với nhà hàng sang trọng, ấm&#8230; </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 item_pading float_image_left content_p3_col_6" style="background-image:url(frontend/images/UploadImages//weddingconference/wedding_800x3001.jpg);background-repeat:no-repeat;background-position:left center;background-size:cover;">
                            <div class="img-desc-home-p3"><img src="frontend/images/UploadImages//weddingconference/wedding_800x3001.jpg" alt="" style="width:100%"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- page 4 - class section-gray adds gray background-->
    <section id="page4">
        <div class="container_page4 clearfix text-center scrolling-item" style="height:75%;">
            <div class="item-container-fluid">
                <div class="item-row-fluid">
                    <div class="row thumbnail video_player clearfix">
                        <img src="frontend/images/photo_temp_video.png" style="width:100%;height:auto">
                    </div>
                    <div class="row clearfix" style="width:330px;height:auto;margin:0 auto">
                        <a href="vn/reservation.html">
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
        <div class="section_footer_as clearfix scrolling-item">
            <div class="row copyright mg0">
                <div class="col-md-3 text-left">
                    <div class="footer_logo">
                        <a href="vn.html"><img class="img-responsive" src="/frontend/images/UploadImages/logo_grey.png" /></a>
                    </div>
                </div>
                <div class="col-md-3 text-left">
                    <div class="footer_logo text_foter">
                        <span class="text_foter_header">AMARIN RESORT PHÚ QUỐC</span><br/>
                        <span><span style="font-size:16px;"><span style="font-family:roboto_condensedlight;">Đường Trần Hưng Đạo, Thị Trấn Dương Đông,<br />
Phú Quốc, Kiên Giang<br />
Điện thoại: (84 297) 6259 666<br />
Email: info@amarinresort.com.vn</span></span>
                        </span>
                    </div>
                </div>
                <div class="col-md-3 text-left">
                    <div class="footer_logo text_foter">
                        <span class="text_foter_header">VĂN PHÒNG ĐẠI DIỆN HCM</span><br/>
                        <span><span style="font-size:16px;"><span style="font-family:roboto_condensedlight;">Phòng 09, Tầng 14, Tòa nhà Vincom,<br />
72 Lê Thánh Tôn, Phường Bến Nghé, TP.HCM<br />
Điện thoại: (84 8) 6868 0245<br />
Email: sales@amarinresort.com.vn<br />
<br />
VĂN PHÒNG ĐẠI DIỆN HÀ NỘI</span></span><br />
                        <span style="font-size:16px;"><span style="font-family:roboto_condensedlight;">10, Đặng Xuân Bảng, Phường Đại Kim,<br />
Quận Hoàng Mai, Hà Nội<br />
Điện thoại: (84 24) 3540 1988</span></span>
                        </span>
                    </div>
                </div>
                <div class="col-md-3 mg0 pd0">
                    <div class="footer_logo">
                        <div class="text-center clearfix">
                            <div class="social_text">KẾT NỐI VỚI&nbsp;
                                <a href="https://www.facebook.com/AmarinresortPQ/" target="_blank"><img src="frontend/icon_social/facebook.png" alt="Facebook" title="Facebook" /></a>
                                <a href="#"><img src="frontend/icon_social/google.png" alt="Google" title="Google" /></a>
                                <a href="#"><img src="frontend/icon_social/instagram.png" alt="Instagram" title="Instagram" /></a>
                            </div>
                        </div>
                        <div class="text-center clearfix">
                            <div class="icon_bottom_menu_ward"><img src="frontend/images/icon_menu.png" /></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix menu_footer text-center" style="padding-bottom:5px;width:100%;clear:both">
                    <a href="vn/welcome/about-us.html">VỀ AMARIN</a> <span>|</span> <a href="vn/accommodation.html">PHÒNG</a> <span>|</span> <a href="vn/gallery.html">THƯ VIỆN</a> <span>|</span> <a href="vn/welcome/sitemap.html">SITEMAP</a> <span>|</span>                    <a href="vn/contact.html">LIÊN HỆ</a>
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

@stop
