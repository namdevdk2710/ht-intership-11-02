@foreach ($cpsModules as $module)
<div class="banner_one clearfix">
    <div class="parent_banner_more">
        <div class="item moving" style="width:100%;margin:0px;padding:0px">
            <img src="../uploads/images/modules/{{$module->image}}" style="width:100%;height:auto">
        </div>
        <div class="carousel-caption">
            <div class="item_content_desc_banner_more">
                <div class="line_item_express"></div>
                <div class="slide_desc text_desc">
                    {{$module->description}}
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
