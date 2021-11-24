@extends('layouts.app')
@section('content')
    @include('admin.modal-cancel', ['route'=>route('admin.manager.usuarios.index')])
    <x-content-section title="{{__('balonmano.ttl_usuario_crear')}}">
        <x-slot name="content">
            <x-form id='addform' method='post' enctype=true action="{{route('admin.manager.usuarios.store')}}">
                <x-content-input>
                    <x-slot name="content">
                        <!-- Email Field -->
                        <div class="form-group col-sm-6">
                            <x-form-textemail id="email" :required="true" label="{{__('balonmano.lbemail')}}"/>
                        </div>
                        <!-- Name Field -->
                        <div class="form-group col-sm-6">
                            <x-form-textfield id="name" :required="true" label="{{__('balonmano.lbnombreApellido')}}"/>
                        </div>
                        <!-- Password Field -->
                        <div class="form-group col-sm-6">
                            <x-form-textpassword id="password" :required="true"
                                                 label="{{__('balonmano.lbcontraseña')}}"/>

                        </div>
                        <!-- Confirmation Password Field -->
                        <div class="form-group col-sm-6">
                            <x-form-textpassword id="password_confirm" :required="true"
                                                 label="{{__('balonmano.lbcontraseñaconfirmar')}}"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-combobox-duallistbox id="role_id" required="true" :datos="$roles"
                                             label="{{__('balonmano.lbrol')}}"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-file-image id="image" :required="true" help="{{__('balonmano.extensiones')}}"  label="{{__('balonmano.lbimagen')}}"
                                               showList="list_image" accept="image/*"/>
                           {{-- <x-form-file id="avatar" :required="false" label="{{__('balonmano.lbimagen')}}"/>--}}
                        </div>

                    </x-slot>
                </x-content-input>
                @include('admin.footer_accion')
            </x-form>
        </x-slot>
    </x-content-section>
@endsection
