@extends('frontend.layouts.master-page-other')

@section('main')
<div class="section_poolbar_lobby_lounge">
    @foreach ($cuisines as $cuisine)
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
                            <img src="http://amarinresort.com.vn/uploads/cafeteria/Amarin_Restaurant_P11.jpg"
                                class="img-responsive" style="width:100%">
                            <div class="pad_content_accom text-padding-poolbar text-left">
                                <div class="option1" style="height: 244px;">
                                    <div class="color_yellow_cu_room">NHÀ HÀNG AROMA</div>
                                    <div class="text_desc">Nhà hàng tọa lạc ngay tại tầng 1 ngay tại tiền sảnh của Khách
                                        Sạn. Không gian mở hướng tầm nhìn ngút ngàn ra biển và hồ bơi chen lẫn dưới những
                                        hàng dừa xanh ngắt, nơi đây thật sự là nơi lý tưởng để bạn và gia đình thưởng thức
                                        những món ăn thuần túy mang hương vị Á - Âu hoặc các món nướng từ hải sản tươi
                                        sốngđược đánh bắt ở làng chài địa phương. Dưới bàn tay tài hoa của bếp trưởng và đội
                                        ngũ đầu bếp đẳng cấp, thực khách sẽ có những trải nghiệm ẩm thực độc đáo trọn vẹn
                                        hương vị biển.<br></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-height-equals col-xs-6 pd10 animated fadeInUp">
                        <div class="content clearfix">
                            <img src="http://amarinresort.com.vn/uploads/cafeteria/Amarin_Restaurant_P2.jpg"
                                class="img-responsive" style="width:100%">
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
    <div class="row mg0 pd0">
        <div class="dinning_title">
            <div id="sunset-pool-bar" class="dinning_item_title">
                <div class="clearfix">BAR HỒ BƠI SUNSET</div>
                <div class="clearfix dinning_item_underline_title"></div>
            </div>
        </div>
    </div>
    <div class="section_accom_content clearfix" style="position:relative;background-color:rgba(255,255,255,1.00)">
        <div class="line_item_express_page_2"></div>
        <div class="row mg0 pd0 clearfix bg_none">
            <div class="col-xs-6 col-height-equals mg0 pd0 option2" style="height: 311px;">
                <div class="text-padding-poolbar text-left">
                    <div class="content-full-height" style="padding-top: 34.3333px;">
                        <div class="color_yellow_cu">TIỆC TRÀ CHIỀU MIỄN PHÍ TẠI HỒ BƠI</div>
                        <div class="text_desc">Trong một ngày lười biếng, không gì thú vị hơn có thể thả người thư thái
                            trên chiếc ghế dài tại quầy bar hồ bơi đọc một cuốn sách yêu thích, nhấp môi ly cocktaill
                            tươi mát và lắng nghe tiếng rì rào của biển cả. Tại đây, bạn cũng có thể thưởng thức thực
                            đơn ăn nhẹ, trái cây, bia và các loại rượu vang hảo hạng.<br>
                            - Giờ hoạt động: 10:00am – 10:00pm<br>
                            <strong>• TIỆC TRÀ CHIỀU MIỄN PHÍ TẠI HỒ BƠI&nbsp;</strong><br>
                            Tiệc trà chiều sẽ được phục vụ miễn phí cho Khách lưu trú tại Khách Sạn khi thư giãn tại khu
                            vực Bể Bơi.<br>
                            - Giờ Hoạt động : 14:00pm đến 15:30pm</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-height-equals mg0 pd0 option2"
                style="background-image: url(&quot;http://amarinresort.com.vn/uploads/pollbar/Amarin_Pool_bar_P2.jpg&quot;); background-repeat: no-repeat; background-position: left center; background-size: cover; height: 311px;">
                <div class="img-desc-home-p3 option2" style="height: 311px;"><img
                        src="http://amarinresort.com.vn/uploads/pollbar/Amarin_Pool_bar_P2.jpg"
                        alt="TIỆC TRÀ CHIỀU MIỄN PHÍ TẠI HỒ BƠI" title="TIỆC TRÀ CHIỀU MIỄN PHÍ TẠI HỒ BƠI"
                        style="width:100%"></div>
            </div>
        </div>

    </div>
    <div class="row mg0 pd0">
        <div class="dinning_title">
            <div id="sense-lobby-lounge" class="dinning_item_title">
                <div class="clearfix">SENSE LOUNGE TIỀN SẢNH</div>
                <div class="clearfix dinning_item_underline_title"></div>
            </div>
        </div>
    </div>
    <div class="section_accom_content clearfix">
        <div class="row" style="position:relative;">
            <div class="line_item_express_page_3"></div>
            <div class="col-height-equals col-xs-6">
                <div class="content clearfix">
                    <img src="http://amarinresort.com.vn/uploads/lobbylounge/lobby_P4.jpg" class="img-responsive"
                        style="width:100%">
                    <div class="pad_content_accom text-padding-poolbar text-left">
                        <div class="option3" style="height: 124px;">
                            <div class="color_yellow_cu_room">SENSE LOUNGE TIỀN SẢNH AMARIN</div>
                            <div class="text_desc">Không gian ấm cúng, tiếng nhạc du dương, là nơi lý tưởng để khách có
                                cơ hội thư giãn trong khi chờ nhận trả phòng hay sau một ngày dài khám phá đảo Ngọc.
                                Thực khách sẽ thỏa thích nhâm nhi các loại bánh Việt hay Âu tùy sở thích dùng kèm với
                                trà , café thơm ngon, được phục vụ theo yêu cầu.<br>
                                SỨC CHỨA: 100 khách</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-height-equals col-xs-6">
                <div class="content clearfix">
                    <img src="http://amarinresort.com.vn/uploads/lobbylounge/lobby_P31.jpg" class="img-responsive"
                        style="width:100%">
                    <div class="pad_content_accom text-padding-poolbar text-left">
                        <div class="option3" style="height: 124px;">
                            <div class="color_yellow_cu_room">PHỤC VỤ THỨC ĂN NHẸ</div>
                            <div class="text_desc">Tựa lưng vào ghế, thưởng thức một tách café trong một sớm nắng mai
                                hoặc làm dịu mát buổi trưa nóng nực với thực đơn cocktail phong phú, bên cạnh đó Lobby
                                Lounge Amarin chú trọng đến những món ăn nhẹ và các loại bánh sẽ kéo dài thêm thời gian
                                thư giãn của bạn.<br>
                                <strong>Giờ hoạt động: 6:00 am – 22:00pm</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
