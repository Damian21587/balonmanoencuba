@extends('layouts.app')
@section('content')
    <section class="content-header">
        <x-btnlink-add href="{{route('admin.nomenclator.titulos.create')}}"/>
    </section>
    <section class="content">
        <x-content-index title=" {{ __('balonmano.ttl_titulo_listar')}}">
            <x-slot name="columns_header">
                <th>@ucfirst('balonmano.lbnombre')</th>
                <th>@ucfirst('balonmano.lbcreadoPor')</th>
                <th class="text-center">@ucfirst('balonmano.acciones')</th>
            </x-slot>
            <x-slot name="columns_body">
                @foreach($titles as $title)
                    <tr>
                        <td>{{ $title->getTranslation('name','es') }}</td>
                        <td>{{ $title->created_by }}</td>
                        <td style="width: 150px;">
                            @can('titulos.edit')
                                <a href="{{route('admin.nomenclator.titulos.edit', $title->id)}}"
                                   class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i
                                            class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('titulos.destroy')
                                <a href="" data-toggle="modal"
                                   data-route="{{route('admin.nomenclator.titulos.destroy', $title->id)}}"
                                   data-target="#modal-delete" class="btn btn-danger  btn-sm" data-toggle="tooltip"
                                   title="Eliminar"><i class="fas fa-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-content-index>
    </section>
@endsection

