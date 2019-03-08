@extends('frontend.layouts.master-page-other')

@section('main')
<div class="section_about clearfix">
    <div class="section_about_content clearfix">
        <div class="row" style="position:relative">
            <div
                class="line_item_express_page_3"
                style="top: 25%; left: 50%; display: block; height: 50%;"
            >
            </div>
            <div class="row-height">
                <div id="col3" class="col-xs-6 col-height col-middle animated fadeInUp">
                    <div class="item-container-fluid">
                        <div class="item-row-fluid text-right">
                            <div class="text-padding">
                                <div class="color_yellow_cu">{{ $detailabouts->name }}</div>
                                <div class="text_desc">{{ $detailabouts->description }}</div>
                                <div class="text_desc">{{ $detailabouts->content }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="col4" class="col-xs-6 col-height animated fadeInUp">
                    <div class="inside text-center">
                        <div class="content pad_content">
                            <div class="content pad_content"><img
                                    src="../uploads/images/abouts/{{$detailabouts->image}}"
                                    class="img-responsive" style="max-height:650px">
                                <div class="button_affect" style="margin-top:25px; margin-left:-50em;">
                                    <span id="draw_lp_left" class=""></span>
                                    <span id="draw_lp_bottom" class=""></span>
                                    <span id="draw_lp_top" class="lp_top"></span>
                                    <span id="draw_lp_right" class=""></span>
                                    <a href="{{ asset('/') }}">&lt; TRỞ LẠI</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
