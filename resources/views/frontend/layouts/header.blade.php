<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amarin - Resort & Spa</title>
    <meta name="description" content="Resort & Spa">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link href="{{ asset('../frontend/css/font.css') }}" rel="stylesheet">
    <link href="{{ asset('../frontend/js/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('../frontend/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('../frontend/css/animations.css') }}" rel="stylesheet">
    <link href="{{ asset('../frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('../frontend/bootstrap/css/animate.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('../frontend/css/custom.css') }}">
    @yield('css')
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
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
            <a class="navbar-brand" href="{{ asset('/') }}">
                <img src="{{ asset('../frontend/images/logo_white.png') }}" style="width:145px;height:auto" />
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown welcome has-child">
                    <a href="{{ asset('/') }}" class="dropdown-toggle" data-toggle="dropdown">
                        CHÀO MỪNG
                    </a>
                    <ul class="dropdown-menu child1">
                        @foreach ($about as $abouts)
                            <li class="no-child st">
                                <a href="{{ route('fe.about.detail_about', ['slug'=>str_slug($abouts->name), 'id'=>$abouts->id]) }}">
                                    {{ $abouts->name }}
                                </a>
                            </li>
                            <li class="divider style"></li>
                        @endforeach
                        <li class="no-child st">
                            <a href="{{ asset('/destination') }}">
                                ĐIỂM ĐẾN
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown accommodation has-child">
                    <a href="{{ asset('/accommodation') }}" class="dropdown-toggle" data-toggle="dropdown">
                        PHÒNG
                    </a>
                    <ul class="dropdown-menu child1">
                        @foreach ($rooms as $room)
                            <li class="no-child st">
                                <a href="{{ route('fe.room.detail', ['slug'=>str_slug($room->name), 'id'=>$room->id]) }}">
                                    {{ $room->name }}
                                </a>
                            </li>
                            <li class="divider style"></li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown facilities has-child">
                    <a href="{{ asset('/facilitie') }}" class="dropdown-toggle" data-toggle="dropdown">TIỆN ÍCH</a>
                    <ul class="dropdown-menu child1">
                        @foreach ($facilities as $facilitie)
                            <li class="no-child st">
                                <a href="{{ asset('/facilitie') }}">{{ $facilitie->name }}</a>
                            </li>
                            <li class="divider style"></li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown dinning has-child">
                    <a href="{{ asset('/cuisine') }}" class="dropdown-toggle" data-toggle="dropdown">ẨM THỰC</a>
                    <ul class="dropdown-menu child1">
                        @foreach ($cuisines as $cuisine)
                            <li class="no-child st">
                                <a href="#{{ $cuisine->id}}">
                                    {{ $cuisine->name }}
                                </a>
                            </li>
                            <li class="divider style"></li>
                        @endforeach
                    </ul>
                </li>
                <li class="gallery no-child">
                    <a href="{{ asset('/gallery') }}">THƯ VIỆN</a>
                </li>
                <li class="special-offers no-child">
                    <a href="{{ asset('/offer') }}">ƯU ĐÃI</a>
                </li>
                <li class="reservation no-child">
                    <a href="{{ asset('/bookroom') }}">ĐẶT PHÒNG</a>
                </li>
                <li class="contact no-child">
                    <a href="{{ asset('/contact') }}">LIÊN HỆ</a>
                </li>
            </ul>
        </div>
    </div>

