@extends('frontend.layouts.master-page-other')

@section('main')

<div class="section_poolbar_lobby_lounge clearfix">
    <div class="section_accom_content clearfix" style="position:relative;">
        <div class="line_item_express_page_2"></div>
        <div class="row mg0 pd0 clearfix">
            <div class="row-height">
                @foreach ($offers as $offer)
                <div class="col-xs-6 mg0 pd0">
                    <a href="{{route('fe.offer.detail', ['slug'=>str_slug($offer->name), 'id'=>$offer->id])}}" class="portfolio-box">
                        <img src="../uploads/images/offers/{{$offer->image}}" alt = {{$offer->name}} class="img-responsive" style="width:100%">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                            <div class="project-name">{{$offer->name}}</div>
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
