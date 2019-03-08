@extends('frontend.layouts.master-page-other')

@section('main')
<div class="section_about clearfix">
    <div class="section_about_content clearfix">
        <div
            class="news-hot row gallery_responvise animated fadeInUp"
            style="position:relative;padding-left:30px;padding-right:30px;padding-top:10px;padding-bottom:10px"
        >
            @foreach ($destinations as $destination)
                <div class="col-xs-4 col-middle mg0 pd0" style="padding:15px">
                    <a href="http://amarinresort.com.vn/vn/welcome/destination/kham-pha-cac-hon-dao" class="portfolio-box">
                        <img src="../uploads/images/destinations/{{$destination->image}}" class="img-responsive">
                        <div class="new_title_box">
                            <div class="new_title_box_content st">
                                {{ $destination->name }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop
