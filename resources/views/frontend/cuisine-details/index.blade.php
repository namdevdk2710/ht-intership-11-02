@extends('frontend.layouts.master-page-other')

@section('main')
<div class="section_poolbar_lobby_lounge">
   @foreach ($cuisines as $key => $cuisine)
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
                   @foreach ($cuisine->id as $cuisineDetail)
                   <div class="col-height-equals col-xs-6 pd10 animated fadeInUp">
                       <div class="content clearfix">
                           <img
                               src="../uploads/images/cuisinedetails/{{$cuisineDetail->image}}"
                               class="img-responsive"
                               style="width:100%"
                           >
                           <div class="pad_content_accom text-padding-poolbar text-left">
                               <div class="option1" style="height: 244px;">
                                   <div class="color_yellow_cu_room">{{$cuisineDetail->name}}</div>
                                   <div class="text_desc">{{$cuisineDetail->description}}
                                       <br>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   @endforeach
               </div>
           </div>
       </div>
   @endforeach
</div>
@stop
