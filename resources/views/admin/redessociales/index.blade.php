@extends('layouts.app')

@section('content')
    <section class="content-header">
        <x-btnlink-add href="{{route('admin.content.redes-sociales.create')}}"/>
    </section>
    <section class="content">
        <x-content-index title=" {{ __('balonmano.ttl_redessociales_listar')}}">
            <x-slot name="columns_header">
                <th>@ucfirst('balonmano.lbtipoRedSocial')</th>
                <th>@ucfirst('balonmano.lburl')</th>
                <th>@ucfirst('balonmano.lbcreadoPor')</th>
                <th class="text-center">@ucfirst('balonmano.acciones')</th>
            </x-slot>
            <x-slot name="columns_body">
                @foreach($socialNetworks as $socialNetwork)
                    <tr>
                        <td>{{ $socialNetwork->type_social_network }}</td>
                        <td>{{ $socialNetwork->name }}</td>
                        <td>{{ $socialNetwork->created_by }}</td>
                        <td style="width: 150px;">
                            @can('redes-sociales.edit')
                                <a href="{{route('admin.content.redes-sociales.edit', $socialNetwork->id)}}"
                                   class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i
                                            class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('redes-sociales.destroy')
                                <a href="" data-toggle="modal"
                                   data-route="{{route('admin.content.redes-sociales.destroy', $socialNetwork->id)}}"
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

