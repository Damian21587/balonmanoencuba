@extends('layouts.app')
@section('content')
    @include('admin.modal-cancel', ['route'=>route('admin.content.contactos.index')])
    <x-content-section title="{{__('balonmano.ttl_contacto_editar')}}">
        <x-slot name="content">
            <x-form id='addform' method='post' enctype=true action="{{route('admin.content.contactos.update', $contact->id)}}"  api="PUT">
                <x-content-input>
                    <x-slot name="content">
                        <div class="form-group col-sm-6">
                            <x-form-texttelephone id="telephone" :required="true" :modelo="$contact" label="{{__('balonmano.lbtelefono')}}"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-textemail id="email" :required="true" :modelo="$contact" label="{{__('balonmano.lbemail')}}"/>
                        </div>
                    </x-slot>
                </x-content-input>
                <x-content-card-tab>
                    <x-slot name="content1">
                        <x-form-textfield id="address_es" :required="true" :modelo="$contact" locale="es" text="address" label="{{__('balonmano.lbdireccion')}}"/>
                    </x-slot>

                    <x-slot name="content2">
                        <x-form-textfield id="address_en" :required="false" :modelo="$contact" locale="en" text="address" label="{{__('balonmano.lbdireccion')}}"/>
                    </x-slot>
                </x-content-card-tab>
                @include('admin.footer_accion')
            </x-form>
        </x-slot>
    </x-content-section>
@endsection
