@extends('layouts.app')
@section('content')
    @include('admin.modal-cancel', ['route'=>route('admin.content.noticias.index')])
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
    <x-content-section title="{{__('balonmano.ttl_noticias_editar')}}">
        <x-slot name="content">
            <x-form id='addform' method='post' enctype=true action="{{route('admin.content.noticias.update', $new->id)}}" api="PUT">
                <x-content-input>
                    <x-slot name="content">
                        <div class="form-group col-sm-6">
                            <x-form-datefield id="publication_date" :required="true" label="{{__('balonmano.lbfechapublicacion')}}" :modelo="$new"/>
                        </div>
                        <div class="form-group col-sm-6">
                            <x-form-file-image id="image" :required="true" help="{{__('balonmano.extensiones')}}" label="{{__('balonmano.lbimagen')}}"
                                               showList="list_image" :modelo="$new" accept="image/*"/>
                        </div>
                    </x-slot>
                </x-content-input>
                <x-content-card-tab>
                    <x-slot name="content1">
                        <x-form-textfield id="title_es" :required="true" label="{{__('balonmano.lbtitulo')}}" :modelo="$new"  locale="es" text="title"/>

                        <x-form-textarea id="description_es" :required="true" :modelo="$new" locale="es" text="description"
                                         label="{{__('balonmano.lbdescripcion')}}"/>
                    </x-slot>

                    <x-slot name="content2">
                        <x-form-textfield id="title_en" :required="false" label="{{__('balonmano.lbtitulo')}}" :modelo="$new"  locale="en" text="title"/>

                        <x-form-textarea id="description_en" :required="false" :modelo="$new" locale="en" text="description"
                                         label="{{__('balonmano.lbdescripcion')}}"/>
                    </x-slot>
                </x-content-card-tab>
                @include('admin.footer_accion')
            </x-form>
        </x-slot>
    </x-content-section>
@endsection
