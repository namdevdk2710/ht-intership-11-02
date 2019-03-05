@extends('frontend.layouts.master-page-other')

@section('main')

<div class="section_about clearfix">
    <div class="section_about_content clearfix">
        <div class="news-hot row animated fadeInUp" style="position:relative">
            <div class="row-height">
                <div class="col-xs-12">
                    <div class="new_details_content">
                        <div class="color_yellow_cu">{{$offerDetail['name']}}</div>
                        <div class="text_desc"><span style="color:#797979;font-size:9pt">2017-02-09</span></div>
                        <div class="text_desc pdt15">
                            <div style="text-align: center;"><img alt="" class="img-responsive img_responsive_center" src="../uploads/images/offers/{{$offerDetail['image']}}"></div>
                        </div>
                        <div class="button_affect" style="margin-top:25px">
                            <span id="draw_lp_left"></span>
                            <span id="draw_lp_bottom"></span>
                            <span id="draw_lp_top" class="lp_top"></span>
                            <span id="draw_lp_right"></span>
                            <a href="{{route('fe.offer.index')}}">&lt; TRỜ LẠI</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
