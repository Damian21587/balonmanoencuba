@extends('layouts.app')
@section('content')
    @include('admin.modal-cancel', ['route'=>route('admin.manager.usuarios.index')])
    <x-content-section title="{{__('balonmano.lbeditarContraseña')}}">
        <x-slot name="content">
            <x-form id='addform' method='post' enctype=true action="{{route('admin.manager.users.password-update', $user->id)}}"  api='PUT'>
                <x-content-input>
                    <x-slot name="content">
                        <!-- Password Field -->
                        <div class="form-group col-sm-6">
                            <x-form-textpassword id="password" :required="true" label="{{__('balonmano.lbcontraseña')}}"/>
                        </div>
                        <!-- Confirmation Password Field -->
                        <div class="form-group col-sm-6">
                            <x-form-textpassword id="password_confirmation" :required="true" label="{{__('balonmano.lbcontraseñaconfirmar')}}"/>
                        </div>
                    </x-slot>
                </x-content-input>
                @include('admin.footer_accion')
            </x-form>
        </x-slot>
    </x-content-section>
@endsection