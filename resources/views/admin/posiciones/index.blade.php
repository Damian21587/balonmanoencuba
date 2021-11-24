@extends('layouts.app')

@section('content')
    <section class="content-header">
        <x-btnlink-add href="{{route('admin.nomenclator.posiciones.create')}}"/>
    </section>
    <section class="content">
        <x-content-index title=" {{ __('balonmano.ttl_posicion_listar')}}">
            <x-slot name="columns_header">
                <th>@ucfirst('balonmano.lbnombre')</th>
                <th>@ucfirst('balonmano.lbcreadoPor')</th>
                <th class="text-center">@ucfirst('balonmano.acciones')</th>
            </x-slot>
            <x-slot name="columns_body">
                @foreach($posiciones as $posicion)
                    <tr>
                        <td>{{ $posicion->getTranslation('name','es') }}</td>
                        <td>{{ $posicion->created_by }}</td>
                        <td style="width: 150px;">
                            @can('posiciones.edit')
                                <a href="{{route('admin.nomenclator.posiciones.edit', $posicion->id)}}"
                                   class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i
                                            class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('posiciones.destroy')
                                <a href="" data-toggle="modal"
                                   data-route="{{route('admin.nomenclator.posiciones.destroy', $posicion->id)}}"
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
