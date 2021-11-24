@extends('layouts.app')
@section('content')
    @include('admin.modal-cancel', ['route'=>route('admin.nomenclator.provincias.index')])
    <x-content-section title="{{__('balonmano.ttl_provincia_crear')}}">

        <x-slot name="content">
            <x-form id='addform' method='post' enctype=true action="{{route('admin.nomenclator.provincias.store')}}">
                <x-content-input>
                    <x-slot name="content">
                        <div class="form-group col-sm-12">
                            <x-form-textfield id="name" :required="true" label="{{__('balonmano.lbnombre')}}"/>
                        </div>
                    </x-slot>
                </x-content-input>
                @include('admin.footer_accion')
            </x-form>
        </x-slot>
    </x-content-section>
@endsection
