<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="{{asset('front-end/css/siteStyle.css')}}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('lib/mdi/iconfont2/css/materialdesignicons.min.css')}}" rel="stylesheet">
</head>
<body>
<a href="#" class="btn btn-sm back-to-top bg-blue-900"
   style="width: 50px;height:40px" role="button" aria-label="Scroll to top">
    <span class="text-white text-2xl pl-3 mdi mdi-chevron-up"></span>
</a>
<nav class="bg-blue-900  bg-opacity-95 sticky top-0 w-full border-b-2  border-l-2 border-white z-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                    <svg class="w-6 h-6 text-gray-50 hover:text-gray-500"
                         x-show="!showMenu"
                         fill="none"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                    >
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <div class="flex-1 flex items-center justify-center sm:items-stretch md:justify-start">
                <!-- Website Logo -->
                <a href="{{route('home')}}" class="logo">
                    <img class="px-3 py-2 w-40 h-auto object-cover" src="{{asset('image/logo/Logo 4.png')}}" alt="">
                </a>
            </div>
            <!-- Primary Navbar items -->
            <div class="hidden md:flex flex-row gap-4">
                <a class="text-white leading-tight self-center hover:text-black uppercase transition duration-300 time-new-roman {{request()->routeIs('home')  || request()->routeIs('home.detalles-jugador') ? 'text-black py-7 px-2 border-b-4 border-gray-50' :  ''}}"
                   href="{{route('home')}}">{{__('home.lbJugadores')}}</a>
                <a class="text-white leading-tight self-center hover:text-black uppercase transition duration-300 time-new-roman  {{request()->routeIs('home.noticias') || request()->routeIs('home.detalles-noticias') ? 'text-black py-7 px-2 border-b-4 border-gray-50' :  ''}}"
                   href="{{route('home.noticias')}}">{{__('home.lbnoticias')}}</a>
                <a class="text-white leading-tight self-center hover:text-black uppercase transition duration-300 time-new-roman {{request()->routeIs('home.quienes-somos')  ? 'text-black py-7 px-2 border-b-4 border-gray-50' :  ''}} "
                   href="{{route('home.quienes-somos')}}">{{__('home.lbQuieneSomos')}}</a>
            </div>
            <div class="text-white text-base leading-tight self-center">
                <div class="relative inline-block text-left">
                    <div>
                        <a class="cursor-pointer inline-flex justify-center w-full px-4 py-2  bg-transparent text-sm font-medium text-gray-700"
                           id="menu-button" aria-expanded="true" aria-haspopup="true"
                           onclick="openDropdown('dropdown-id1')">
                            <img src="{{ Config::get('languages')[App::getLocale()]['url-flag'] }}" width="30"
                                 height="30" class="rounded-full relative absolute border-4 border-white" alt="">
                            <span
                                class="text-white hover:text-black text-lg mdi mdi-chevron-down -mr-1 ml-2 h-5 w-5"></span>
                        </a>
                    </div>
                    <div id="dropdown-id1"
                         class="hidden origin-top-right absolute right-3 mt-0 w-auto rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
                         role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="flex flex-col gap-3 px-3 py-1 rounded-md" role="none">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="text-gray-700 block self-center  text-sm"
                                       href="{{ route('lang.switch', $lang) }}" role="menuitem" tabindex="-1"
                                       id="menu-item-0">
                                        <img src="{{ Config::get('languages')[$lang]['url-flag'] }}" width="30"
                                             height="30" class="rounded-full"
                                             alt="">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile menu button -->

        </div>
    </div>
    <!-- mobile menu -->
    <div class="hidden mobile-menu">
        <ul>
            <li class="py-1">
                <a class="text-white text-sm px-3 py-4 leading-tight self-center hover:text-black uppercase transition duration-300 time-new-roman {{request()->routeIs('home')  || request()->routeIs('home.detalles-jugador') ? 'text-black' :  ''}}"
                   href="{{route('home')}}">{{__('home.lbJugadores')}}</a></li>
            <li class="py-1">
                <a class="text-white text-sm px-3 py-4 leading-tight self-center hover:text-black uppercase transition duration-300 time-new-roma  {{request()->routeIs('home.noticias') || request()->routeIs('home.detalles-noticias') ? 'text-black' :  ''}}"
                   href="{{route('home.noticias')}}">{{__('home.lbnoticias')}}</a>
            <li class="pb-4 pt-1">
                <a class="text-white text-sm px-3 py-4 leading-tight self-center hover:text-black uppercase transition duration-300 time-new-roma {{request()->routeIs('home.quienes-somos')  ? 'text-black' :  ''}} "
                   href="{{route('home.quienes-somos')}}">{{__('home.lbQuieneSomos')}}</a></li>
        </ul>
    </div>
    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
</nav>
<div class="content-wrapper">
    <section class="content">
        @yield('content')
    </section>
</div>
<footer class="w-full">
    <div class="container mx-auto px-20 bg-blue-900">
        <div class="text-center py-5 pt-10">
            <h1 class="text-5xl text-white uppercase lato-hairline">{{__('home.lbcontactos')}}</h1>
        </div>
        {{--<div class="sm:flex sm:flex-wrap sm:-mx-4 mt-6 pt-6 sm:mt-12 sm:pt-12 border-t">
        </div>--}}
        {{--<div class="flex flex-wrap -m-4">
            <div class="lg:p-4 md:w-1/3">
                <div class="flex rounded-lg h-full p-8 flex-col">
                    <div class="flex mx-auto mb-3 text-white text-lg time-new-roman">
                        <i class="pr-2 mdi mdi-google-maps"></i>
                        <span
                            class="title-font font-medium"> @if($contacto) {{$contacto->getTranslation('address',App::getLocale()) }} @endif</span>
                    </div>
                </div>
            </div>
            <div class="lg:p-4 md:w-1/3">
                <div class="flex rounded-lg h-full p-8 flex-col">
                    <div class="flex mx-auto mb-3 text-white text-lg time-new-roman">
                        <i class="pr-2 mdi mdi-email"></i>
                        <span class="title-font font-medium">@if($contacto) {{$contacto->email}}@endif</span>
                    </div>
                </div>
            </div>
            <div class="lg:p-4 md:w-1/3">
                <div class="flex rounded-lg h-full p-8 flex-col">
                    <div class="flex mx-auto mb-3 text-white text-lg time-new-roman">
                        <i class="pr-2 mdi mdi-phone"></i>
                        <span class="title-font font-medium">@if($contacto) {{$contacto->telephone}}@endif</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="sm:flex sm:flex-wrap sm:-mx-4 mt-6 pt-6 sm:mt-12 sm:pt-12 border-t">
        </div>--}}
        <div class="container px-5 py-24 pt-6 mx-auto flex sm:flex-nowrap flex-wrap">
            <div
                class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                <iframe class="absolute inset-0"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1234.3096604387651!2d-82.43596709593811!3d23.078794900922027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDA0JzQ0LjIiTiA4MsKwMjYnMTIuNyJX!5e0!3m2!1ses!2scu!4v1635005091368!5m2!1ses!2scu"
                        height="100%"
                        width="100%"
                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                    <div class="lg:w-1/2 px-6">
                        <div class="flex mx-auto mb-3 text-gray-700 time-new-roman tracking-widest text-xs sm:text-lg">
                            <i class="pr-2 mdi mdi-google-maps"></i>
                            <span
                                class="title-font font-medium"> @if($contacto) {{$contacto->getTranslation('address',App::getLocale()) }} @endif</span>
                        </div>
                    </div>
                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                        <div class="flex mx-auto mb-3 text-gray-700 time-new-roman tracking-widest text-xs sm:text-lg">
                            <i class="pr-2 mdi mdi-email"></i>
                            <span class="title-font font-medium">@if($contacto) {{$contacto->email}}@endif</span>
                        </div>
                        <div class="flex mx-auto mb-3 text-gray-700 time-new-roman tracking-widest text-xs sm:text-lg mt-4">
                            <i class="pr-2 mdi mdi-phone"></i>
                            <span class="title-font font-medium">@if($contacto) {{$contacto->telephone}}@endif</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 rounded-lg px-6">
                <form id="contactForm" role="form" method="post" enctype="multipart/form-data"
                      action="{{ route('home.mensaje-contacto')}}">
                    <div class="relative mb-4 lg:mt-0 mt-8">
                        <label for="name" class="leading-7 text-sm text-black">{{__('home.lbnombre')}}
                            <small class="required" style="color: red"> * </small> </label>
                        <input type="text" id="name" name="name" {{--placeholder="{{__('home.lbnombre')}}"--}}
                               class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700  py-1 px-3 leading-8 transition-colors duration-200 ease-in-out @error('name') border-red-500 @enderror">
                        <span class=" flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1" id="error_name">
                    </div>
                    <div class="relative mb-4">
                        <label for="email" class="leading-7 text-sm text-black">{{__('home.lbemail')}}
                            <small class="required" style="color: red"> * </small> </label>
                        <input type="email" id="email" name="email" {{--placeholder="{{__('home.lbemail')}}"--}}
                               class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out @error('email') is-invalid @enderror">
                        <span class=" flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1" id="error_email">
                    </div>
                    <div class="relative mb-4">
                        <label for="message" class="leading-7 text-sm text-black">{{__('home.lbmensaje')}}
                            <small class="required" style="color: red"> * </small> </label>
                        <textarea id="message" name="message" {{--placeholder="{{__('home.lbmensaje')}}"--}}
                                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out @error('message') is-invalid @enderror"></textarea>
                        <span class=" flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1" id="error_message">
                    </div>
                </form>
                <button class="text-white bg-blue-900 uppercase font-bold rounded-full px-10 py-2 px-6 lg:mb-2 mb-8 text-lg hover:opacity-70"
                        id="enviar_mensaje_contacto"
                        type="button">{{__('home.lbenviar')}}</button>
            </div>
        </div>
        {{--<div class="container mx-auto flex px-5 py-24 md:flex-row lg:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-full">
                 <input type="hidden" id="mensaje_contacto" value="{{$success}}">
                <form id="contactForm" role="form" method="post" enctype="multipart/form-data"
                      action="{{ route('home.mensaje-contacto')}}">
                    <div id="alertas"
                         class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <div class="flex items-center justify-center w-12 bg-red-500">
                            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"
                                />
                            </svg>
                        </div>
                        <div class="px-4 py-2 pb-5 -mx-3">
                            <div class="mx-3">
                                <span class="font-semibold text-red-500 dark:text-red-400">Atención a las siguientes indicaciones</span>
                                <p id="error_name"
                                   class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                </p>
                                <p id="error_email"
                                   class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                </p>
                                <p id="error_message"
                                   class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>--}}
    </div>
    <div class="-mt-5">
        <div class="flex flex-row gap-3 justify-center">
            @foreach($redes_sociales as $redes_sociale)
                @if($redes_sociale->type_social_network ==__('home.lbFacebook'))
                    <div class="bg-white rounded-full px-2 py-1 transform transition duration-500 hover:scale-110">
                        <a href="{{ $redes_sociale->name }}" target="_blank"><span
                                class="text-3xl mdi mdi-facebook"></span></a>
                    </div>
                @endif
                @if($redes_sociale->type_social_network==__('home.lbTwitter'))
                    <div class="bg-white rounded-full px-2 py-1 transform transition duration-500 hover:scale-110"><a
                            href="{{ $redes_sociale->name }}"
                            target="_blank"><span
                                class="text-3xl mdi mdi-instagram "></span></a></div>
                @endif
                @if($redes_sociale->type_social_network==__('home.lbInstagram'))
                    <div class="bg-white rounded-full px-2 py-1 transform transition duration-500 hover:scale-110"><a
                            href="{{ $redes_sociale->name }}"
                            target="_blank"><span
                                class="text-3xl mdi mdi-twitter "></span></a>
                    </div>
                @endif
                @if($redes_sociale->type_social_network==__('home.lbYoutube'))
                    <div class="bg-white rounded-full px-2 py-1 transform transition duration-500 hover:scale-110"><a
                            href="{{ $redes_sociale->name }}"
                            target="_blank"><span
                                class="text-3xl mdi mdi-youtube "></span></a>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="text-center">
            <h1 class="text-lg lato-bold time-new-roman">© {{ date('Y')}} {{__('home.lbnfooterBalonmanoEnCuba')}}</h1>
            <h1 class="text-lg lato-bold time-new-roman">{{__('home.lbderechoReservado')}}</h1>
        </div>
    </div>
</footer>
<!-- jQuery -->
<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">

    /*  $('#alertas').hide();*/

    $('#enviar_mensaje_contacto').on('click', function (event) {
        event.preventDefault();
        let form = $('#contactForm');
        let url = form.attr('action');
        let dataformulario = $('#contactForm').get(0);

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: url,
            method: "POST",
            data: new FormData(dataformulario),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    limpiarCampos()
                }
            },
            error: function (data) {
                if (data.responseJSON) {
                    $.each(data.responseJSON.errors, function (key, value) {
                        /*$('#alertas').show();*/
                        showErrors(key, value);
                    });
                }
            }
        });

    });
    $('#name').on('input', function () {
        var name = document.getElementById('name')
        if (name.value != '') {
            $('#name').removeClass('border-red-500');
            $('#error_name').html('');
        }
    })

    $('#email').on('input', function () {
        var email = document.getElementById('email')
        if (email.value != '') {
            $('#email').removeClass('border-red-500');
            $('#error_email').html('');
        }
    })

    $('#message').on('input', function () {
        var message = document.getElementById('message')
        if (message.value != '') {
            $('#message').removeClass('border-red-500');
            $('#error_message').html('');
        }
    })

    function limpiarCampos() {
        $("#name").val('');
        $("#email").val('');
        $("#message").val('');
    }

    function showErrors(key, value) {
        $('#' + key).addClass('border-red-500');
        $('#error_' + key).html('');
        $('#error_' + key).append(value);
    }

    /*function mensajeContacto() {
        /!*if (mensaje_contacto)
            showMsg('{{__('home.lbMsGraciasEncuesta')}}')*!/
    }*/

</script>

<script type="text/javascript">

    function openDropdown(dropdownID) {
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
    }

    $(document).ready(function () {
        $('.back-to-top').fadeOut();
        //Check to see if the window is top if not then display button
        $(window).scroll(function () {

            // Show button after 100px
            var showAfter = 100;
            if ($(this).scrollTop() > showAfter) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });

        //Click event to scroll to top
        $('.back-to-top').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

    });
</script>
</body>
</html>

