@extends('layouts.app')

@section('content')
    <section class="content-header">
        <x-btnlink-add href="{{route('admin.content.jugadores.create')}}"/>
    </section>
    <section class="content">
        <x-content-index title=" {{ __('balonmano.ttl_jugadores_listar')}}">
            <x-slot name="columns_header">
                <th>@ucfirst('balonmano.lbnombreApellido')</th>
                <th>@ucfirst('balonmano.lbimagen')</th>
                <th>@ucfirst('balonmano.lbmedida')</th>
                <th>@ucfirst('balonmano.lbpeso')</th>
                <th>@ucfirst('balonmano.lbcreadoPor')</th>
                <th class="text-center">@ucfirst('balonmano.acciones')</th>
            </x-slot>
            <x-slot name="columns_body">
                @foreach($players as $player)
                    <tr>
                        <td>{{ $player->name }}</td>
                        <td><img src="{{asset('/storage/'.$player->image->url)}}" class="img-circle img-thumbnail "
                                 width="75px"
                                 height="75px" alt="Imagen"></td>
                        <td>{{ $player->measure }}</td>
                        <td>{{ $player->weigth }}</td>
                        <td>{{ $player->created_by }}</td>
                        <td style="width: 150px;">
                            @can('jugadores.edit')
                                <a href="{{route('admin.content.jugadores.edit', $player->id)}}"
                                   class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i
                                            class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('jugadores.destroy')
                                <a href="" data-toggle="modal"
                                   data-route="{{route('admin.content.jugadores.destroy', $player->id)}}"
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

