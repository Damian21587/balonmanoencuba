<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Login</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css')}}"/>

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    {{-- <![endif]-->

    {{--<style>
        .parallax {
            /* The image used */
            background-image: url("img_parallax.jpg");

            /* Set a specific height */
            min-height: 250px;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>--}}

</head>
<body class="hold-transition login-page"
        {{--style="background-image: url({{asset('image/body-pillows-handball-background.jpg.jpg')}});background-repeat: no-repeat ;background-size: cover;"--}}
        {{--style="background-position:center center; background-size:cover; background-image: url({{asset('image/fundas-de-almohada-balonmano-fondo.jpg')}})"--}}>
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img src="{{asset('image/logo/logo 4.jpg')}}" alt="AdminLTE Logo"
                 class="img-thumbnail embed-responsive center-box">
            {{-- <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>--}}
        </div>

        <!-- /.login-logo -->

        <!-- /.login-box-body -->
        <div class="card-body">
            <p class="login-box-msg">Regístrese para iniciar su sesión en el panel de Administración de Balonmano en Cuba</p>

            <form method="post" action="{{ url('/login') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Correo Electrónico"
                           class="form-control @error('email') is-invalid @enderror">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           name="password"
                           placeholder="Contraseña"
                           class="form-control @error('password') is-invalid @enderror">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Recuérdame</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
                    </div>

                </div>
            </form>

            <p class="mb-1">
                <a href="{{ route('password.request') }}">Olvidé mi contraseña</a>
            </p>
            {{-- <p class="mb-0">
                 <a href="{{ route('register') }}" class="text-center">Registrar una nueva membresía</a>
             </p>--}}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>

{{--<script src="{{asset('adminLTE/plugins/popper/popper.min.js')}}"></script>--}}
<!-- Bootstrap 4 -->
<script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLTE/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
