@extends('layouts.app')
@section('content')
    @include('admin.modal-cancel', ['route'=>route('admin.content.redes-sociales.index')])
    <x-content-section title="{{__('balonmano.ttl_redessociales_editar')}}">
        <x-slot name="content">
            <x-form id='addform' method='post' enctype=true action="{{route('admin.content.redes-sociales.update', $socialNetwork->id)}}" api='PUT'>
                <x-content-input>
                    <x-slot name="content">
                        <div class="form-group  col-sm-6">
                            <x-form-enum id="type_social_network" required="true" label="{{__('balonmano.lbtipoRedSocial')}}"
                                         :datos="$type_social_networks" :modelo="$socialNetwork"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-textfield id="name" :required="true" label="{{__('balonmano.lburl')}}" :modelo="$socialNetwork"/>
                            <span class="help-block">{{__('balonmano.lbformatoURL')}}</span>
                        </div>
                    </x-slot>
                </x-content-input>
                @include('admin.footer_accion')
            </x-form>
        </x-slot>
    </x-content-section>
@endsection
