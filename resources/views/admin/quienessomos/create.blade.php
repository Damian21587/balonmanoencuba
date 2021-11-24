@extends('layouts.app')
@section('content')
    @include('admin.modal-cancel', ['route'=>route('admin.content.quienes-somos.index')])
    {{--@if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                    </button>
                                    <h5><i class="icon fas fa-check"></i> Atención lea las siguientes indicaciones</h5>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif--}}
    <x-content-section title="{{__('balonmano.ttl_quienessomos_crear')}}">
        <x-slot name="content">
            <x-form id='addform' method='post' enctype=true action="{{route('admin.content.quienes-somos.store')}}">
                <x-content-input>
                    <x-slot name="content">
                        <div class="form-group col-sm-12">
                            <x-form-file-image id="image" :required="true" help="{{__('balonmano.extensiones')}}"  label="{{__('balonmano.lbimagen')}}"
                                               showList="list_image" accept="image/*"/>
                        </div>
                    </x-slot>
                </x-content-input>
                <x-content-card-tab>
                    <x-slot name="content1">
                        <x-form-textarea id="description_es" :required="true" label="{{__('balonmano.lbdescripcion')}}"/>
                    </x-slot>

                    <x-slot name="content2">
                        <x-form-textarea id="description_en" :required="false" label="{{__('balonmano.lbdescripcion')}}"/>
                    </x-slot>
                </x-content-card-tab>
                @include('admin.footer_accion')
            </x-form>
        </x-slot>
    </x-content-section>
@endsection
