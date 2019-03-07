@extends('frontend.layouts.master-page-other')

@section('main')
<div class="section_accom_detail clearfix">
    <div class="section_accom_content clearfix">
        <div
            class="row mg0 pd0"
            style="position:relative;background-color:rgba(252,252,252,1.00) !important"
        >
            <div
                class="line_item_express_page_2"
                style="top: 50%; left: 50%; display: block; overflow: hidden; height: 53.0213%;"
            >
            </div>
            <div id="col1" class="col-xs-6 col-middle mg0 pd0 animated fadeInUp">
                <img src="../uploads/images/rooms/{{ $roomDetail->image }}" class="img-responsive" style="width:100%">
            </div>
            <div id="col2" class="col-xs-6 col-middle mg0 pd0 animated fadeInUp">
                <div class="content detail_room_intro">
                    <div class="text-left">
                        <div class="color_yellow_cu_room text-center">GIỚI THIỆU</div>
                        <div class="text_desc pdt15">
                            {{ $roomDetail['content'] }}
                        </div>
                    </div>
                    <div class="row mg0 pd0">
                        <div class="col-xs-6 mg0 pd0" style="padding-top:15px;">
                            <div class="text_desc_room">
                                SỐ LƯỢNG PHÒNG:&nbsp;
                                <span class="text_desc_room_item_rate">{{ $roomDetail['amount'] }}</span><br>
                                DIỆN TÍCH:&nbsp;
                                <span class="text_desc_room_item_rate">{{ $roomDetail['area'] }} m2</span><br>
                                GIÁ PHÒNG:&nbsp;
                                <span class="text_desc_room_item_rate">{{ $roomDetail['price'] }} VNĐ</span><br>
                                <span class="text_desc_room_item_rate_apply"></span>
                            </div>
                        </div>
                        <div class="col-xs-6 mg0 pd0 pdt20">
                            <a href="{{ asset('/bookroom') }}">
                                <div class="button_booking float_text_right">
                                    <div class="button_booking_bg"></div>
                                    <div class="button_booking_text">ĐẶT PHÒNG</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content detail_room_amenities">
                    <div class="text-left">
                        <div class="color_yellow_cu_room text-center" style="margin-bottom: 1em;">
                            TIỆN ÍCH VÀ DỊCH VỤ
                        </div>
                    </div>
                    <div class="row mg0 pd0 pdt10">
                        @foreach ($roomservice as $ros)
                            <div class="gallery_responvise">
                                <div class="col-xs-6 mg0 pd0 text_desc" style="margin-bottom: 1em;">
                                    <img src="../uploads/images/roomservices/{{ $ros->icon }}">
                                    {{ $ros->name}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row orther_room mg0 pd0">
    <div class="section_accom_content_orther_room clearfix animated fadeInUp">
        <div class="row mg0 pd0 text-center">
            <span class="color_yellow_cu">CÁC PHÒNG KHÁC</span>
        </div>
        <div class="row">
            <div class="row-height gallery_responvise">
                @foreach ($anotherrooms as $roomdt)
                    <div class="col-xs-4 col-middle mg0 pd0" style="padding:20px">
                        <a href="{{ route('fe.room.detail', ['slug'=>str_slug($roomdt->name), 'id'=>$roomdt->id]) }}" class="portfolio-box">
                            <img src="../uploads/images/rooms/{{ $roomdt->image }}"
                                class="img-responsive" style="width:100%">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-name">
                                        DELUXE OCEAN VIEW
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
