@extends('layouts.master') 
@section('main')
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

                <div class="item moving">
                    <img src="{{asset('frontend/images/UploadImages/banners/Amarin_banner_hompage_1600x1200_P1.jpg')}}">
                    <div class="carousel-caption">
                        <div class="item_content_desc_home" data-animation="animated fadeInUp">
                            <div class="line_item_express"></div>
                            <div class="slide_desc text_desc">Chỉ cách bãi biển vài bước chân, bao quanh bởi hàng dừa xanh tươi, mát mẻ, hồ bơi tại resort sử dụng hệ thống lọc muối điện phân không lưu trữ clo luôn an toàn, bảo vệ môi trường cũng như sức khoẻ cho bạn và cả gia đình tự
                                tin vẫy vùng thoả thích trong làn nước trong xanh.</div>
                            <div class="slide_btn">
                                <div class="button_affect">
                                    <span id="draw_lp_left"></span>
                                    <span id="draw_lp_bottom"></span>
                                    <span id="draw_lp_top" class="lp_top"></span>
                                    <span id="draw_lp_right"></span>
                                    <a href="#" target="_blank" style="font-size:7pt">CHI TIẾT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item moving">
                    <img src="{{asset('frontend/images/UploadImages/banners/Amarin_banner_hompage_1600x1200_P2.jpg">
                    <div class="carousel-caption">
                        <div class="item_content_desc_home" data-animation="animated fadeInUp">
                            <div class="line_item_express"></div>
                            <div class="slide_desc text_desc">Một hàng dừa xanh mát nghiêng ngả dọc bãi cát trắng, một khu nghỉ dưỡng độc đáo đậm chất sống của miền nhiệt đới với lối thiết kế kiến trúc phong cách đương đại và tối giản, đắm chìm với hoàng hôn dọc bờ biển, Amarin Resort
                                & Spa không phải chỉ đang mở rộng cửa các căn phòng mà đang mở những cánh cửa giác quan cảm nhận thế giới tự nhiên của bạn.</div>
                            <div class="slide_btn">
                                <div class="button_affect">
                                    <span id="draw_lp_left"></span>
                                    <span id="draw_lp_bottom"></span>
                                    <span id="draw_lp_top" class="lp_top"></span>
                                    <span id="draw_lp_right"></span>
                                    <a href="#" target="_blank" style="font-size:7pt">CHI TIẾT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page 2-->
    <section id="page2">
        <div class="line_item_express_page_2"></div>
        <div class="content content_p2">
            <a href="vn/welcome/about-us.html">
                <div class="row clearfix content_p2_row">
                    <div class="col-xs-6 item_pading content_p2_col_6 scrolling-item slideLeft">
                        <div class="item-container-fluid">
                            <div class="item-row-fluid">
                                <div class="item_contain_right">
                                    <p class="text-right">
                                        <span class="color_blue_grey">CHÀO MỪNG BẠN ĐẾN VỚI</span><br/>
                                        <span class="color_yellow_cu">AMARIN RESORT & SPA</span>
                                    </p>
                                    <p class="text_desc">
                                        Amarin Resort & Spa - khu nghỉ dưỡng nằm ngay trung tâm Dương Đông, được xây dựng theo tiêu chuẩn 4 sao bao gồm 96 phòng nghỉ dưỡng với thiết kế hiện đại, không gian sống rộng mở. Đến với Amarin, bạn sẽ có được những góc nhìn tuyệt nhất về một không gian
                                        ngập tràn gió biển và chan hoà ánh&#8230; </p>
                                    <div style="width:100%;text-align:right;padding-right:2px;">
                                        <div class="button_affect" style="float:right">
                                            <span id="draw_lp_left"></span>
                                            <span id="draw_lp_bottom"></span>
                                            <span id="draw_lp_top" class="lp_top"></span>
                                            <span id="draw_lp_right"></span> CHI TIẾT </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 item_pading content_p2_col_6 scrolling-item-1 slideRight" style="background-image:url(frontend/images/UploadImages/abouts/Amarin_Aboutus2.jpg);background-repeat:no-repeat;background-position:right center;background-size:cover;">
                        <div class="img-desc-home"><img src="frontend/images/UploadImages/abouts/Amarin_Aboutus2.jpg" alt="" style="width:100%"></div>
                    </div>
                </div>
            </a>
            <a href="vn/welcome/about-us.html">
                <div class="row clearfix content_p2_row top50">
                    <div class="col-xs-6 item_pading float_text_right content_p2_col_6 scrolling-item-2 slideRight">
                        <div class="item-container-fluid">
                            <div class="item-row-fluid">
                                <div class="item_contain_left">
                                    <p class="text-left">
                                        <span class="color_blue_grey">ĐẢO NGỌC</span><br/>
                                        <span class="color_yellow_cu">PHÚ QUỐC</span>
                                    </p>
                                    <p class="text_desc">
                                        Cách TP.HCM chỉ 45 phút bay, Đảo Ngọc nằm ở vùng biển phía Nam của đất nước này đã níu chân du khách bằng sức hấp dẫn từ thiên nhiên, cảnh sắc đến văn hóa, con người.Phú Quốc chinh phục bạn bằng chính vẻ đẹp thiên nhiên thuần khiết, hoang sơ của bãi Sao,
                                        bãi Dài, bãi Trường, Hòn Móng Tay…mở ra&#8230; </p>
                                    <div style="width:100%;text-align:center;padding-left:2px;">
                                        <div class="button_affect">
                                            <span id="draw_lp_left"></span>
                                            <span id="draw_lp_bottom"></span>
                                            <span id="draw_lp_top" class="lp_top"></span>
                                            <span id="draw_lp_right"></span> CHI TIẾT </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 item_pading float_image_left content_p2_col_6  scrolling-item-2 slideLeft" style="background-image:url(frontend/images/UploadImages//abouts/imag_PhuQuoc_750x5002.jpg);background-repeat:no-repeat;background-position:left center;background-size:cover;">
                        <div class="img-desc-home"><img src="frontend/images/UploadImages//abouts/imag_PhuQuoc_750x5002.jpg" alt="" style="width:100%"></div>
                    </div>
                </div>
            </a>
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