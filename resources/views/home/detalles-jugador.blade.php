@extends('layouts.fronts.app')
@section('content')
    <div class="container mx-auto bg-gray-50">
        <div class="flex flex-col gap-10 text-center px-32 pt-24 pb-10">
            <div class="text-center mb-20 pt-24">
                <h1 class="sm:text-7xl text-2xl text-gray-600 uppercase lato-hairline mb-4">{{__('home.lbdetallesJugador')}}</h1>
                <p class="text-2xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-300 uppercase time-new-roman">{{__('home.lbdetalleJugadorSlogan')}}</p>
                <div class="flex mt-6 justify-center mt-6 mb-4">
                    <div class="w-20 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                </div>
                <h2 class="text-2xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-300 uppercase time-new-roman">Valero Rivera</h2>
            </div>
        </div>
        <div class="flex flex-col gap-10 px-32 pt-15 pb-10">
            <div class="bg-white shadow overflow-hidden rounded-lg sm:rounded-lg">
                <div class="bg-center bg-cover bg-no-repeat w-auto h-72 object-cover" style="background-image: url({{asset('../image/bg.jpg')}})">
                    <div class="container mx-auto">
                        <div class="flex flex-col gap-10 px-10 py-32 ">
                            {{--<div class="bg-gray-300 rounded-full self-center"></div>--}}
                            <img class="object-cover rounded-full h-40 w-40 relative absolute border-4 border-white" style="top: 80px" src="{{asset('/storage/'.$player->image->url)}}">
                        </div>
                    </div>
                </div>
               {{-- <img class="w-full h-72 object-cover" src="">--}}
                <div class="px-4 pt-32 pb-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-black lato-bold">
                        {{$player->name}}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500 lato-bold opacity-75">
                        {{__('home.lbdatosJugador')}}
                    </p>
                </div>
                <div class="border-t border-gray-200 pb-5">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 lato-bold">
                                {{__('home.lbprovincia')}}
                            </dt>
                            <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2 text-base text-lg dosis-extralight dosis-regular">
                                {{$player->provincia->name}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 lato-bold">
                                {{__('home.lbmedida')}}
                            </dt>
                            <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2 text-base text-lg dosis-extralight dosis-regular">
                                {{$player->measure}}
                                <span class="mdi mdi-human-male-height text-gray-500"></span>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 lato-bold">
                                {{__('home.lbpeso')}}
                            </dt>
                            <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2 text-base text-lg dosis-extralight dosis-regular">
                                {{$player->weigth}}
                                <span class="mdi mdi-weight-kilogram text-gray-500"></span>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 lato-bold">
                                {{__('home.lbexperiencia')}}
                            </dt>
                            <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2 text-base text-lg dosis-extralight dosis-regular">
                                {{$player->years_experience}}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 lato-bold">
                                {{__('home.lbposicion')}}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 text-base text-lg dosis-extralight dosis-regular">
                                    {{ $resultado_positions}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 lato-bold">
                                {{__('home.lbtitulos')}}
                            </dt>
                            <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                                <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                        <div class="w-0 flex-1 flex items-center">
                                            <!-- Heroicon name: solid/paper-clip -->

                                            <span class="ml-2 flex-1 w-0 truncate text-gray-500 lato-bold">
                                                 {{__('home.lbtitulo')}}
                                             </span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0 text-gray-500 lato-bold">
                                            <div class="font-medium">
                                                {{__('home.lbcantidad')}}
                                            </div>
                                        </div>
                                    </li>
                                    @foreach($player->player_titles as $player_title)
                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                            <div class="w-0 flex-1 flex items-center">
                                                <!-- Heroicon name: solid/paper-clip -->

                                                <span class="ml-2 flex-1 w-0 truncate text-base text-lg dosis-extralight dosis-regular">
                                                 {{$player_title->title->getTranslation('name',App::getLocale())}}
                                             </span>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <div class="font-medium dosis-extralight text-base text-lg dosis-regular">
                                                    {{$player_title->amount}}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 lato-bold">
                                {{__('home.lbacercaJugador')}}
                            </dt>
                            <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2 text-base text-lg dosis-extralight dosis-regular">
                                {{$player->getTranslation('about_player',App::getLocale())}}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
