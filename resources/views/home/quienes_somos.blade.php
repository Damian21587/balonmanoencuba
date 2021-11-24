@extends('layouts.fronts.app')
@section('content')
    <div class="container mx-auto bg-gray-50">
        <div class="flex flex-col gap-10 text-center px-32 pt-24 pb-10">
            <div class="text-center mb-20">
                <h1 class="sm:text-7xl text-2xl text-gray-600 uppercase lato-hairline mb-4">{{__('home.lbQuieneSomos')}}</h1>
                <p class="text-2xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-300 uppercase time-new-roman">{{__('home.lbQuieneSomosSlogan')}}</p>
                <div class="flex mt-6 justify-center mt-6 mb-4">
                    <div class="w-20 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                </div>
                <h2 class="text-2xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-300 uppercase time-new-roman">Emil Zátopek</h2>
            </div>

            <div class="lg:w-4/6 mx-auto">
                @if($quienes_somos!=null)
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img class="object-cover object-center h-full w-full"
                             src="{{asset('/storage/'.$quienes_somos->image->url)}}">
                    </div>
                    <div class="flex flex-col sm:flex-row mt-10">
                        <div class="px-6 py-4">
                            <p class="leading-relaxed text-base text-justify text-lg dosis-extralight dosis-regular mb-4">
                                {{$quienes_somos->getTranslation('description',App::getLocale())}}
                            </p>
                        </div>
                    </div>
                @endif()
            </div>
            {{--@dd(url('/image/Balonmano 3.jpg'))--}}
            {{--<div class="relative bg-fixed bg-center bg-cover bg-no-repeat" style="background-image: url('{{ asset('/storage/'.$quienes_somos->image) }}') "></div>--}}
            {{--<div class="bg-fixed bg-center bg-cover bg-no-repeat h-96" style="background-image: url({{asset('/storage/'.$quienes_somos->image)}})">
            </div>--}}
        </div>
    </div>
@endsection
