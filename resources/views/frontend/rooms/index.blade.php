@extends('frontend.layouts.master-page-other')

@section('main')
<div class="section_accom">
    <div class="section_accom_content">
        <div class="row" style="position:relative">
            <div class="line_item_express_page_2"></div>
            <div class="row-height">
                @foreach($rooms as $room)
                <div class="details-response col-xs-6 col-middle pd0">
                    <div class="item-container-fluid">
                        <div class="item-row-fluid text-padding">
                            <div class="content pad_content clearfix">
                                <div class="portfolio-box">
                                    <a href="accommodation/deluxe-hill-view.html"><img src="../uploads/images/rooms/{{$room->image}}" class="img-responsive" style="width:100%"></a>
                                </div>
                                <div class="pad_content_accom" style="padding:30px">
                                    <div class="clearfix">
                                        <a href="accommodation/deluxe-hill-view.html">
                                            <div class="color_yellow_cu_room">{{ $room->name}}</div>
                                            <div class="text_desc mm_con_rooms">{{ str_limit($room->description,100) }}&#8230;</div>
                                        </a>
                                    </div>
                                    <div class="clearfix">
                                        <div style="width:100%;position:relative;height:35px;margin-top:35px;">
                                            <div class="clearfix button_affect pull-right">
                                                <span id="draw_lp_left"></span>
                                                <span id="draw_lp_bottom"></span>
                                                <span id="draw_lp_top" class="lp_top"></span>
                                                <span id="draw_lp_right"></span>
                                                <a href="{{ route('fe.room.detail', ['slug'=>str_slug($room->name), 'id'=>$room->id]) }}">CHI TIẾT</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
