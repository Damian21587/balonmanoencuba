@extends('layouts.app')
@section('content')
    @include('admin.modal-cancel', ['route'=>route('admin.nomenclator.titulos.index')])
    <x-content-section title="{{__('balonmano.ttl_titulo_editar')}}">
        <x-slot name="content">
            <x-form id='addform' method='post' enctype=true action="{{route('admin.nomenclator.titulos.update', $title->id)}}" api="PUT">
                <x-content-card-tab>
                    <x-slot name="content1">
                        <x-form-textfield id="name_es" :required="true" :modelo="$title" locale="es" text="name" label="{{__('balonmano.lbnombre')}}"/>
                    </x-slot>

                    <x-slot name="content2">
                        <x-form-textfield id="name_en" :required="false" :modelo="$title" locale="en" text="name" label="{{__('balonmano.lbnombre')}}"/>
                    </x-slot>
                </x-content-card-tab>
                @include('admin.footer_accion')
            </x-form>
        </x-slot>
    </x-content-section>
@endsection
