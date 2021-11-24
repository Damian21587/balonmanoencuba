@extends('layouts.app')

@section('content')
    <section class="content-header">
        <x-btnlink-add href="{{route('admin.content.noticias.create')}}"/>
    </section>
    <section class="content">
        <x-content-index title=" {{ __('balonmano.ttl_noticias_listar')}}">
            <x-slot name="columns_header">
                <th>@ucfirst('balonmano.lbtitulo')</th>
                <th>@ucfirst('balonmano.lbimagen')</th>
                <th>@ucfirst('balonmano.lbcreadoPor')</th>
                <th class="text-center">@ucfirst('balonmano.acciones')</th>
            </x-slot>
            <x-slot name="columns_body">
                @foreach($news as $new)
                    <tr>
                        <td>{{ $new->getTranslation('title','es') }}</td>
                        <td><img src="{{asset('/storage/'.$new->image->url )}}" class="img-circle img-thumbnail "
                                 width="75px"
                                 height="75px" alt="Imagen"></td>
                        <td>{{ $new->created_by }}</td>
                        <td style="width: 150px;">
                            @can('noticias.edit')
                                <a href="{{route('admin.content.noticias.edit', $new->id)}}"
                                   class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i
                                            class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('noticias.destroy')
                                <a href="" data-toggle="modal"
                                   data-route="{{route('admin.content.noticias.destroy', $new->id)}}"
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

