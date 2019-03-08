<div class="section_footer_as clearfix scrolling-item">
        <div class="row copyright mg0">
            <div class="col-md-3 text-left">
                <div class="footer_logo">
                    <a href="{{ asset('/') }}">
                        <img class="img-responsive" src="{{ asset('../frontend/images/logo_grey.png') }}" />
                    </a>
                </div>
            </div>
            @foreach ($introducesAll as $introduce)
            <div class="col-md-3 text-left">
                <div class="footer_logo text_foter">
                    <span class="text_foter_header">{{ $introduce->name }}</span><br/>
                    <span>
                        <span style="font-size:16px;">
                            <span style="font-family:roboto_condensedlight;">
                                {{$introduce->address}}
                                Điện thoại: {{$introduce->phone}}<br />
                                Email: {{$introduce->email}}
                            </span>
                        </span>
                    </span>
                </div>
            </div>
            @endforeach
            <div class="col-md-3 mg0 pd0">
                <div class="footer_logo">
                    <div class="text-center clearfix">
                        <div class="social_text">KẾT NỐI VỚI&nbsp;
                            <a href="#" target="_blank">
                                <img src="{{ asset('../frontend/icon_social/facebook.png') }}" alt="Facebook" title="Facebook" />
                            </a>
                            <a href="#">
                                <img src="{{ asset('../frontend/icon_social/google.png') }}" alt="Google" title="Google" />
                            </a>
                            <a href="#">
                                <img src="{{ asset('../frontend/icon_social/instagram.png') }}" alt="Instagram" title="Instagram" />
                            </a>
                        </div>
                    </div>
                    <div class="text-center clearfix">
                        <div class="icon_bottom_menu_ward">
                            <img src="{{ asset('../frontend/images/icon_menu.png') }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix menu_footer text-center" style="padding-bottom:5px;width:100%;clear:both">
                <a href="{{ asset('/') }}">VỀ AMARIN</a>
                <span>|</span>
                <a href="{{ asset('/accommodation') }}">PHÒNG</a>
                <span>|</span> <a href="{{ asset('/gallery') }}">THƯ VIỆN</a>
                <span>|</span><a href="{{ asset('/facilitie') }}">TIỆN ÍCH</a>
                <span>|</span> <a href="{{ asset('/contact') }}">LIÊN HỆ</a>
            </div>
            <div class="clearfix pull-left" style="padding-top:5px;width:100%;text-align:center;background-color:#c1c6cf">
                <p class="text_foter">
                    © 2016 Amarin Resort Phu Quoc Island. All rights reserved<br/> Developed by Media Gurus
                </p>
            </div>
        </div>
    </div>
    <!-- Javascript files-->
    <script src="{{ asset('../frontend/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('../frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('../frontend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('../frontend/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../frontend/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('../frontend/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('../frontend/js/front_as.js') }}"></script>
    <script src="{{ asset('../frontend/js/dinning_animate.js') }}"></script>
    <script src="{{ asset('../frontend/js/gallery_animate.js') }}"></script>
    <script language="javascript ">
        $(function() {
            $(".dinning ").addClass("active ");
        });
    </script>
    <script language="javascript ">
        $(window).on('load resize ', function() {
            if ($(window).width() > 768) {
                //Option 1
                var hopt1s = $(".option1 ").map(function() {
                    return $(this).height()
                }).get();
                var maxItemHeightOpt1 = Math.max.apply(null, hopt1s);
                $(".option1 ").animate({
                    height: maxItemHeightOpt1 + "px "
                }, 500, function() {});
                /*
                $('.option1 ').css({
                    'height ': maxItemHeightOpt1
                });
                */
                //Option 2
                var hopt2s = $(".option2 ").map(function() {
                    return $(this).height()
                }).get();
                var maxItemHeightOpt2 = Math.max.apply(null, hopt2s);
                $(".option2 ").animate({
                    height: maxItemHeightOpt2 + "px "
                }, 500, function() {
                    var el = $(this).find('.content-full-height ');
                    var cbv = el.height();
                    if (cbv > 0 && cbv != null) {
                        var abc = maxItemHeightOpt2 - cbv;
                        el.css({
                            'padding-top ': (abc / 3) + "px "
                        });
                    }
                });
                /*
                $('.option2 ').css({
                        'height ': maxItemHeightOpt2
                });
                */
                //Option 3
                var hopt3s = $(".option3 ").map(function() {
                    return $(this).height()
                }).get();
                var maxItemHeightOpt3 = Math.max.apply(null, hopt3s);
                $('.option3 ').css({
                    'height ': maxItemHeightOpt3
                });
            } else {
                $('.option1 ').css({
                    'height ': 'auto '
                });
                $('.option2 ').css({
                    'height ': 'auto '
                });
                $('.option3 ').css({
                    'height ': 'auto '
                });
            }
        });
    </script>
    </body>

    </html>
