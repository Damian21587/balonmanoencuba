<div class="container mx-auto bg-gray-50">
    <div class="flex flex-col gap-10 text-center px-4 sm:px-32 pt-24 pb-10">
        <div class="text-center mb-20">
            <h1 class="sm:text-7xl text-5xl text-gray-600 uppercase lato-hairline mb-4">{{__('home.lbJugadores')}}</h1>
            <p class="text-xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-300 uppercase time-new-roman">{{__('home.lbJugadoresSlogan')}}</p>
            <div class="flex mt-6 justify-center mt-6 mb-4">
                <div class="w-20 h-1 rounded-full bg-indigo-500 inline-flex"></div>
            </div>
            <h2 class="text-xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-300 uppercase time-new-roman">Nikola Karabatic</h2>
        </div>
        {{--<div>
            <h1 class="sm:text-center text-gray-600 text-7xl uppercase lato-hairline pb-3">{{__('home.lbJugadores')}}</h1>
            <h1 class="text-2xl text-gray-300 uppercase time-new-roman">{{__('home.lbJugadoresSlogan')}}</h1>
        </div>
        <div class="sm:flex sm:flex-wrap sm:-mx-4 mt-6 pt-6 sm:mt-12 sm:pt-12 border-t">
        </div>--}}
        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
            @foreach($players as $player)
                <div class="p-4 md:w-1/3 flex flex-col text-center items-center">

                    <a href="{{route('home.detalles-jugador',$player->id)}}"
                       class="bg-gray-200 rounded-full self-center transform transition duration-500 hover:scale-110">
                        <img src="{{asset('/storage/'.$player->image->url)}}"
                             class="object-cover rounded-full h-40 w-40 p-2" alt="">
                    </a>
                    <div class="flex-grow">
                        <div class="text-center pt-6">
                            <h1 class="text-xl text-gray-500 uppercase lato-bold">{{ $player->name }}</h1>
                        </div>
                        <div class="text-justify pt-6">
                            <div>
                                <h1 class="text-lg text-gray-500 lato-bold opacity-50">{{__('home.lbacercaJugador')}}</h1>
                            </div>
                            <p class="text-base text-justify text-lg dosis-extralight dosis-regular py-3">
                                {!! strip_tags(Str::limit($player->getTranslation('about_player',App::getLocale()), 250, ' (...)')) !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $players->links() }}
    </div>
</div>
