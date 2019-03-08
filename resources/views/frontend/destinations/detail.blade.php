@extends('frontend.layouts.master-page-other')

@section('main')
<div class="section_about clearfix">
    <div class="section_about_content clearfix">
        <div class="news-hot row animated fadeInUp" style="position:relative">
            <div class="row-height">
                <div class="col-xs-12 text-center">
                    <div class="new_details_content">
                        <img src="../uploads/images/destinations/{{ $destination->image }}"
                            class="img-responsive new_photo-details">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="new_details_content">
                        <div class="color_yellow_cu">{{ $destination->name }}</div>
                        <div class="text_desc"><span style="color:#797979;font-size:9pt">{{ $destination->updated_at }}</span></div>
                        <div class="text_desc">
                            {{ $destination->description }}
                        </div>
                        <div class="text_desc">
                            {{ $destination->content }}
                        </div>
                        <div class="button_affect" style="margin-top:10px">
                            <span id="draw_lp_left"></span>
                            <span id="draw_lp_bottom"></span>
                            <span id="draw_lp_top" class="lp_top"></span>
                            <span id="draw_lp_right"></span>
                            <a href="{{ asset('/destination') }}">&lt; TRỜ LẠI</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
