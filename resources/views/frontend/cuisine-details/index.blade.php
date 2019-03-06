@extends('frontend.layouts.master-page-other')

@section('main')
<div class="section_poolbar_lobby_lounge">
    @foreach ($cuisines as $key => $cuisine)
        <div class="row mg0 pd0" style="padding-top:25px">
            <div class="dinning_title animated fadeInUp">
                <div id="aroma-restaurant" class="dinning_item_title">
                    <div class="clearfix">{{ $cuisine->name}}</div>
                    <div class="clearfix dinning_item_underline_title"></div>
                </div>
            </div>
        </div>
        <div class="orther_room" style="margin-bottom:25px;margin-top:25px">
            <div class="section_accom_content">
                <div class="row" style="position:relative">
                    <div class="line_item_express_page_4" style="top: 20%; left: 50%; display: block; height: 65%;"></div>
                    <div class="col-height-equals col-xs-6 pd10 animated fadeInUp">
                        <div class="content clearfix">
                            <img
                                src="http://amarinresort.com.vn/uploads/cafeteria/Amarin_Restaurant_P11.jpg"
                                class="img-responsive"
                                style="width:100%"
                            >
                            <div class="pad_content_accom text-padding-poolbar text-left">
                                <div class="option1" style="height: 244px;">
                                    <div class="color_yellow_cu_room">NHÀ HÀNG AROMA</div>
                                    <div class="text_desc">Nhà hàng tọa lạc ngay tại tầng 1 ngay tại tiền sảnh của Khách
                                        Sạn. Không gian mở hướng tầm nhìn ngút ngàn ra biển và hồ bơi chen lẫn dưới những
                                        hàng dừa xanh ngắt, nơi đây thật sự là nơi lý tưởng để bạn và gia đình thưởng thức
                                        những món ăn thuần túy mang hương vị Á - Âu hoặc các món nướng từ hải sản tươi
                                        sốngđược đánh bắt ở làng chài địa phương. Dưới bàn tay tài hoa của bếp trưởng và đội
                                        ngũ đầu bếp đẳng cấp, thực khách sẽ có những trải nghiệm ẩm thực độc đáo trọn vẹn
                                        hương vị biển.
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-height-equals col-xs-6 pd10 animated fadeInUp">
                        <div class="content clearfix">
                            <img
                                src="http://amarinresort.com.vn/uploads/cafeteria/Amarin_Restaurant_P2.jpg"
                                class="img-responsive"
                                style="width:100%"
                            >
                            <div class="pad_content_accom text-padding-poolbar text-left">
                                <div class="option1" style="height: 244px;">
                                    <div class="color_yellow_cu_room">ẨM THỰC ÂU, Á, VIỆT NAM PHONG PHÚ</div>
                                    <div class="text_desc">AMARIN Resort Phú quốc đáp ứng các hình thức tổ chức tiệc phong
                                        phú theo yêu cầu gồm:<br>
                                        - Tiệc tự chọn Buffet gồm hải sản và các loại Ẩm thực Âu, Á, Việt Nam&nbsp;<br>
                                        - Tiệc Gala Dinner<br>
                                        - Tiệc theo thực đơn (Set Menu)<br>
                                        - Tiệc theo món (À- la-carte)<br>
                                        - Tiệc nướng ngoài trời BBQ<br>
                                        - Chương trình âm nhạc đa đạng theo yêu cầu<br>
                                        <strong>AROMA RESTAURANT:</strong><br>
                                        • SỨC CHỨA:200 Khách<br>
                                        • Giờ hoạt động :6:00 am – 21:30pm</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@stop
