@extends('layouts.app')
@section('content')
    @include('admin.modal-cancel', ['route'=>route('admin.content.noticias.index')])
    <x-content-section title="{{__('balonmano.ttl_noticias_crear')}}">
        <x-slot name="content">
            <x-form id='addform' method='post' enctype=true action="{{route('admin.content.noticias.store')}}">
                <x-content-input>
                    <x-slot name="content">
                        <div class="form-group col-sm-6">
                           <x-form-datefield id="publication_date" :required="true" label="{{__('balonmano.lbfechapublicacion')}}"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-file-image id="image" :required="true" help="{{__('balonmano.extensiones')}}" label="{{__('balonmano.lbimagen')}}"
                                               showList="list_image" accept="image/*"/>
                        </div>
                    </x-slot>
                </x-content-input>
                <x-content-card-tab>
                    <x-slot name="content1">
                        <x-form-textfield id="title_es" :required="true" label="{{__('balonmano.lbtitulo')}}"/>

                        <x-form-textarea id="description_es" :required="true"
                                         label="{{__('balonmano.lbdescripcion')}}"/>
                    </x-slot>

                    <x-slot name="content2">
                        <x-form-textfield id="title_en" :required="false" label="{{__('balonmano.lbtitulo')}}"/>

                        <x-form-textarea id="description_en" :required="false"
                                         label="{{__('balonmano.lbdescripcion')}}"/>
                    </x-slot>
                </x-content-card-tab>
                @include('admin.footer_accion')
            </x-form>
        </x-slot>
    </x-content-section>
@endsection

