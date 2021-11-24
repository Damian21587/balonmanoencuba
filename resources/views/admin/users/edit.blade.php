@extends('layouts.app')
@section('content')
    @include('admin.modal-cancel', ['route'=>route('admin.manager.usuarios.index')])
    <x-content-section title="{{__('balonmano.ttl_usuario_editar')}}">
        <x-slot name="content">
            <x-form id='addform' method='post' enctype=true action="{{route('admin.manager.usuarios.update', $user->id)}}"  api='PUT'>
                <x-content-input>
                    <x-slot name="content">
                        <!-- Email Field -->
                        <div class="form-group col-sm-6">
                            <x-form-textemail id="email" :required="true" label="{{__('balonmano.lbemail')}}" :modelo="$user" />

                        </div>
                        <!-- Name Field -->
                        <div class="form-group col-sm-6">
                            <x-form-textfield id="name" :required="true" label="{{__('balonmano.lbnombreApellido')}}" :modelo="$user"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-combobox-duallistbox id="role_id" :required="true" :datos="$roles" label="{{__('balonmano.lbrol')}}" :modelo="$user"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-file-image id="image" :required="true" help="{{__('balonmano.extensiones')}}" label="{{__('balonmano.lbimagen')}}"
                                               showList="list_image" :modelo="$user" accept="image/*"/>
                        </div>
                    </x-slot>
                </x-content-input>
                @include('admin.footer_accion')
            </x-form>
        </x-slot>
    </x-content-section>
@endsection
