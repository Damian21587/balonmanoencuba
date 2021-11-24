<div class="container mx-auto bg-gray-50">
    <div class="flex flex-col gap-10 text-center px-32 pt-24 pb-10">
        <div class="text-center mb-20">
            <h1 class="sm:text-7xl text-2xl text-gray-600 uppercase lato-hairline mb-4">{{__('home.lbnoticias')}}</h1>
            <p class="text-2xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-300 uppercase time-new-roman">{{__('home.lbnoticiasSlogan')}}</p>
            <div class="flex mt-6 justify-center mt-6 mb-4">
                <div class="w-20 h-1 rounded-full bg-indigo-500 inline-flex"></div>
            </div>
            <h2 class="text-2xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-300 uppercase time-new-roman">Padre de ELi Pinedo</h2>
        </div>
        <div class="flex flex-wrap -m-4">
            @foreach($news as $new)
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden  shadow-lg transform transition duration-1000  hover:scale-110 opacity-75 hover:opacity-100">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center"
                             src="{{asset('/storage/'.$new->image->url)}}">
                        <div class="p-6">
                            <span class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 mdi mdi-calendar "> {{__('home.lbfechaPublicacion')}}: {{$new->publication_date}}</span>
                           {{-- <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>--}}
                            <h1 class="title-font text-lg font-medium text-gray-500 lato-bold mb-3">{{ $new->getTranslation('title',App::getLocale()) }}</h1>
                            <p class="leading-relaxed text-base text-justify text-lg dosis-extralight dosis-regular mb-3">
                                {!! strip_tags(Str::limit($new->getTranslation('description',App::getLocale()), 190, ' (...)')) !!}
                            </p>
                            <a href="{{route('home.detalles-noticias',$new->id)}}" class="px-6 pt-4 pb-2 float-right">
                                <span
                                    class="md:mb-2 lg:mb-0 inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{__('home.lbleerMas')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $news->links() }}
    </div>
</div>
