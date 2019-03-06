@extends('frontend.layouts.master-page-other')

@section('main')
<div class="section_poolbar_lobby_lounge">
    @foreach ($facilities as $key => $facilitie)
        <div class="row mg0 pd0" style="padding-top:25px">
            <div class="dinning_title animated fadeInUp">
                <div id="wedding-conference" class="dinning_item_title">
                    <div class="clearfix">{{ $facilitie->name }}</div>
                    <div class="clearfix dinning_item_underline_title"></div>
                </div>
            </div>
        </div>
        <div class="orther_room" style="margin-bottom:25px;margin-top:25px; background-color:#9aa8b1;display: block;">
            <div class="section_fac_top">
                <div class="row mg0 pd0"
                    style="position:relative;background-color:rgba(252,252,252,1.00) !important;padding:15px">
                    @foreach ($facilitie->id as $facilitieDetail)
                        <div class="col-xs-6 mg0 pd0 float_text_right animated fadeInUp" style="min-height: 362px;">
                            <div class="content detail_room_amenities">
                                <div class="text-center">
                                    <div class="color_yellow_cu_room" style="padding-bottom:10px; font-size: 1.5em;">{{ $facilitieDetail->name }}</div>
                                    <div class="text_desc pdt15 img-size-100">
                                        {{ $facilitieDetail->content}}.&nbsp;
                                    </div>
                                    <div style="width:170px; margin:0 auto; clear:both">
                                        <a href="{{ asset('/bookroom') }}">
                                            <div class="button_video" style="float:left; margin-right:10px">
                                                <div class="button_video_bg"></div>
                                                <div class="button_video_text">ĐẶT PHÒNG</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 mg0 pd0 animated fadeInUp">
                            <img src="../uploads/images/facilitiedetails/{{$facilitieDetail->image}}"
                                class="img-responsive" style="width:100%; margin-top: 2em;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
@stop
