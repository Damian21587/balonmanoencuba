@extends('layouts.app')
@section('content')
    @include('admin.modal-cancel', ['route'=>route('admin.content.contactos.index')])
    <x-content-section title="{{__('balonmano.ttl_contacto_crear')}}">
        <x-slot name="content">
            <x-form id='addform' method='post' enctype=true action="{{route('admin.content.contactos.store')}}">
                <x-content-input>
                    <x-slot name="content">
                        <div class="form-group col-sm-6">
                        <x-form-texttelephone id="telephone" :required="true" label="{{__('balonmano.lbtelefono')}}"/>
                        </div>
                        <div class="form-group col-sm-6">
                        <x-form-textemail id="email" :required="true" label="{{__('balonmano.lbemail')}}"/>
                        </div>
                    </x-slot>
                </x-content-input>
                <x-content-card-tab>
                    <x-slot name="content1">
                        <x-form-textfield id="address_es" :required="true" label="{{__('balonmano.lbdireccion')}}"/>
                    </x-slot>

                    <x-slot name="content2">
                        <x-form-textfield id="address_en" :required="false" label="{{__('balonmano.lbdireccion')}}"/>
                    </x-slot>
                </x-content-card-tab>
                @include('admin.footer_accion')
            </x-form>
        </x-slot>
    </x-content-section>
@endsection
