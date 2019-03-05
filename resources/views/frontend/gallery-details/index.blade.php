@extends('frontend.layouts.master-page-other') @section('main')
<div class="orther_room">
    <div class="section_fac_top" style="background-color:#eceff6;">
        <div id="row1" class="row mg0 pd0 clearfix">
            <div class="color_yellow_cu text-left" style="padding:25px 0px 15px 15px">&gt;&gt;
                HÌNH ẢNH
            </div>
        </div>
        <div id="row2" class="row mg0 pd0 gallery_responvise" style="padding:15px">
            @foreach ($galleryDetails as $galleryDetail)
            <div class="col-xs-4 mg0 pd0">
                <a href="../uploads/images/gallerydetails/{{$galleryDetail->image}}" data-group="1" class="portfolio-box galleryItem">
                    <img src="../uploads/images/gallerydetails/{{$galleryDetail->image}}" class="img-responsive" style="width:100%">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-name">
                                <div style="width:100px;margin: 0 auto;padding-bottom:5px;padding-top:0px;text-align:center;border:1px solid #FFF">XEM</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
