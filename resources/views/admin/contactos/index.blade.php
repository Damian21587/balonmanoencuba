@extends('layouts.app')
@section('content')
    @if(count($contacts)<=0)
    <section class="content-header">
        <x-btnlink-add href="{{route('admin.content.contactos.create')}}"/>
    </section>
    @endif
    <section class="content">
        <x-content-index title=" {{ __('balonmano.ttl_contacto_listar')}}">
            <x-slot name="columns_header">
                <th>@ucfirst('balonmano.lbtelefono')</th>
                <th>@ucfirst('balonmano.lbemail')</th>
                <th>@ucfirst('balonmano.lbcreadoPor')</th>
                <th class="text-center">@ucfirst('balonmano.acciones')</th>
            </x-slot>
            <x-slot name="columns_body">
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->telephone }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->created_by }}</td>
                        <td style="width: 150px;">
                            @can('contactos.edit')
                                <a href="{{route('admin.content.contactos.edit', $contact->id)}}"
                                   class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i
                                            class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('contactos.destroy')
                                <a href="" data-toggle="modal"
                                   data-route="{{route('admin.content.contactos.destroy', $contact->id)}}"
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

