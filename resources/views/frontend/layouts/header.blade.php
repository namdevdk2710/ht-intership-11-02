<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amarin - Resort & Spa</title>
    <meta name="description" content="Resort & Spa">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link href="{{asset('../frontend/css/font.css')}}" rel="stylesheet">
    <link href="{{asset('../frontend/js/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('../frontend/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('../frontend/css/animations.css')}}" rel="stylesheet">
    <link href="{{asset('../frontend/bootstrap/css/animate.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('../frontend/css/custom.css')}}">
    @yield('css')
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <div class="navbar navbar-default container-menu navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Menu</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
            <a class="navbar-brand" href="http://amarinresort.com.vn/vn"><img src="http://amarinresort.com.vn/local/logo/logo_white.png" style="width:145px;height:auto" /></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown welcome has-child">
                    <a href="{{ asset('/') }}" class="dropdown-toggle" data-toggle="dropdown">CHÀO MỪNG</a>
                    <ul class="dropdown-menu child1">
                        <li class="no-child"><a href="#">VỀ AMARIN</a></li>
                        <li class="divider"></li>
                        <li class="no-child"><a href="http://amarinresort.com.vn/vn/welcome/destination">ĐIỂM ĐẾN</a></li>
                    </ul>
                </li>
                <li class="dropdown accommodation has-child">
                    <a href="{{ asset('/accommodation') }}" class="dropdown-toggle" data-toggle="dropdown">PHÒNG</a>
                    <ul class="dropdown-menu child1">
                        <li class="no-child"><a href="http://amarinresort.com.vn/vn/accommodation/deluxe-hill-view">DELUXE HILL VIEW</a></li>
                        <li class="divider"></li>
                        <li class="no-child"><a href="http://amarinresort.com.vn/vn/accommodation/deluxe-ocean-view">DELUXE OCEAN VIEW</a></li>
                        <li class="divider"></li>
                        <li class="no-child"><a href="http://amarinresort.com.vn/vn/accommodation/amarin-suite">AMARIN SUITE</a></li>
                        <li class="divider"></li>
                        <li class="no-child"><a href="http://amarinresort.com.vn/vn/accommodation/president-suite">PRESIDENT SUITE</a></li>
                        <li class="divider"></li>
                        <li class="no-child"><a href="http://amarinresort.com.vn/vn/accommodation/room-rates">GIÁ PHÒNG</a></li>
                    </ul>
                </li>
                <li class="dropdown facilities has-child">
                    <a href="{{ asset('/facilitie') }}" class="dropdown-toggle" data-toggle="dropdown">TIỆN ÍCH</a>
                    <ul class="dropdown-menu child1">
                        <li class="no-child"><a href="http://amarinresort.com.vn/vn/facilities/wedding-conference">DỊCH VỤ</a></li>
                        <li class="divider"></li>
                        <li class="no-child"><a href="http://amarinresort.com.vn/vn/facilities/spa">SPA</a></li>
                        <li class="divider"></li>
                        <li class="no-child"><a href="http://amarinresort.com.vn/vn/facilities/kids-club">KHU VUI CHƠI TRẺ EM</a></li>
                    </ul>
                </li>
                <li class="dropdown dinning has-child">
                    <a href="{{ asset('/cuisine') }}" class="dropdown-toggle" data-toggle="dropdown">ẨM THỰC</a>
                    <ul class="dropdown-menu child1">
                        <li class="no-child"><a href="http://amarinresort.com.vn/vn/dinning/aroma-restaurant">NHÀ HÀNG AROMA</a></li>
                        <li class="divider"></li>
                        <li class="no-child"><a href="http://amarinresort.com.vn/vn/dinning/sunset-pool-bar">BAR HỒ BƠI SUNSET</a></li>
                        <li class="divider"></li>
                        <li class="no-child"><a href="http://amarinresort.com.vn/vn/dinning/sense-lobby-lounge">SENSE LOUNGE TIỀN SẢNH</a></li>
                    </ul>
                </li>
                <li class="gallery no-child"><a href="{{ asset('/gallery') }}">THƯ VIỆN</a></li>
                <li class="special-offers no-child"><a href="{{ asset('/offer') }}">ƯU ĐÃI</a></li>
                <li class="reservation no-child"><a href="{{ asset('/bookroom') }}">ĐẶT PHÒNG</a></li>
                <li class="contact no-child"><a href="http://amarinresort.com.vn/vn/contact">LIÊN HỆ</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>

