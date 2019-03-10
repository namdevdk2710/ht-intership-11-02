<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="{{asset('')}}">
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('../backend/css/main.css') }}"
        >
        <link
            rel="stylesheet"
            type="text/css"
            href="{{ asset('../backend/css/style.css') }}"
        >
        <link
            rel="stylesheet"
            type="text/css"
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        >
        <title>Login - HT Resort</title>
    </head>
    <body class="  pace-done">
        @if(session('msg'))
            <div class="alert alert-danger alert-dismissible fade show messag ">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session('msg')}}
            </div>
        @endif
        @if ($errors->has('email'))
            <ul class="alert alert-danger close_ul" style="width: 17em; float: right;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                @foreach ($errors->get('email') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if ($errors->has('password'))
            <ul class="alert alert-danger close_ul" style="width:17em;float:right;clear: left; margin-top:4em; margin-right:-17em;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                @foreach ($errors->get('password') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="pace  pace-inactive">
            <div
                class="pace-progress"
                data-progress-text="100%"
                data-progress="99"
                style="transform: translate3d(100%, 0px, 0px);"
            >
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>
        <section class="material-half-bg">
            <div class="cover"></div>
        </section>
        <section class="login-content">
            <div class="logo">
                <h1>HT Resort</h1>
            </div>
            <div class="login-box">
                {{ Form::open(['method' => 'POST', 'route' => ['admin.postLogin'], 'class' => 'login-form']) }}
                    <h3 class="login-head">
                        <i class="fa fa-lg fa-fw fa-user"></i>SIGN IN
                    </h3>
                    <div class="form-group">
                        {{ Form::label('email', 'Email:', ['class'=>'control-label']) }}
                        {{ Form::email('email', '', ['placeholder'=>'Email', 'class'=>'form-control', 'autofocus'=>'']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('password','Password:', ['class'=>'control-label']) }}
                        {{ Form::password('password', ['placeholder'=>'Password', 'class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        <div class="utility">
                            <div class="animated-checkbox">
                                <label>
                                    <input type="checkbox">
                                    <span class="label-text">Stay Signed in</span>
                                </label>
                            </div>
                            <p class="semibold-text mb-2">
                                <a href="#" data-toggle="flip">Forgot Password ?</a>
                            </p>
                        </div>
                    </div>
                    <div class="form-group btn-container">
                        {{ Form::button(
                            '<i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN',
                            ['class' => 'btn btn-primary btn-block',
                            'type' => 'submit'])
                         }}
                    </div>
                {{ Form::close() }}
                {{ Form::open(['method' => 'POST', 'class' => 'forget-form']) }}
                    <h3 class="login-head">
                        <i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?
                    </h3>
                    <div class="form-group">
                        {{ Form::label('email', 'EMAIL', ['class'=>'control-label']) }}
                        {{ Form::email('email', '', ['placeholder'=>'Email', 'class'=>'form-control', 'placeholder'=>'Email']) }}
                    </div>
                    <div class="form-group btn-container">
                        <button class="btn btn-primary btn-block">
                            <i class="fa fa-unlock fa-lg fa-fw"></i>RESET
                        </button>
                    </div>
                    <div class="form-group mt-3">
                        <p class="semibold-text mb-0">
                            <a href="#" data-toggle="flip">
                                <i class="fa fa-angle-left fa-fw"></i> Back to Login
                            </a>
                        </p>
                    </div>
                {{ Form::close() }}
            </div>
        </section>
    <script src="{{ asset('../backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('../backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('../backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../backend/js/main.js') }}"></script>
    <script src="{{ asset('../backend/js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript">
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });

        $("div.alert-success").delay(4000).slideUp();
        $(".close_ul").delay(4000).slideUp();
    </script>

    </body>
</html>
