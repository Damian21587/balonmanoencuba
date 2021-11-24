@extends('layouts.fronts.app')
@section('content')
    <div class="container mx-auto bg-gray-50">
        <div class="text-center mb-20 pt-24">
            <h1 class="sm:text-7xl text-2xl text-gray-600 uppercase lato-hairline mb-4">{{__('home.lblaNoticia')}}</h1>
            <p class="text-2xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-300 uppercase time-new-roman">{{__('home.lbnoticiasSlogan')}}</p>
            <div class="flex mt-6 justify-center mt-6 mb-4">
                <div class="w-20 h-1 rounded-full bg-indigo-500 inline-flex"></div>
            </div>
            <h2 class="text-2xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-300 uppercase time-new-roman">Jared Leto</h2>
        </div>
        <div class="flex flex-col gap-3 px-32 pb-24">
            <div class=" mx-auto flex px-5 py-10 md:flex-row flex-col items-center">
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                    <img class="object-cover object-center rounded" alt="hero" src="{{asset('/storage/'.$new->image->url)}}">
                </div>
                <div class="self-end lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-500 lato-bold">{{$new->getTranslation('title',App::getLocale())}}
                    </h1>
                    <p class="leading-relaxed opacity-75"><span class="mdi mdi-calendar"></span> {{__('home.lbfechaPublicacion')}}: {{$new->publication_date}}</p>
                </div>

            </div>
            <div>
                <p class="mb-8 leading-relaxed text-base text-lg dosis-extralight dosis-regular">{{$new->getTranslation('description',App::getLocale())}}</p>
            </div>
        </div>
    </div>
@endsection
