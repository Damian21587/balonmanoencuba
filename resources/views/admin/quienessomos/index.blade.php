@extends('layouts.app')

@section('content')
    @if(count($abouts)<=0)
        <section class="content-header">
            <x-btnlink-add href="{{route('admin.content.quienes-somos.create')}}"/>
        </section>
    @endif
    <section class="content">
        <x-content-index title=" {{ __('balonmano.ttl_quienessomos_listar')}}">
            <x-slot name="columns_header">
                <th>@ucfirst('balonmano.lbimagen')</th>
                <th>@ucfirst('balonmano.lbcreadoPor')</th>
                <th class="text-center">@ucfirst('balonmano.acciones')</th>
            </x-slot>
            <x-slot name="columns_body">
                @foreach($abouts as $about)
                    <tr>
                        <td><img src="{{asset('/storage/'.$about->image->url)}}" class="img-circle img-thumbnail "
                                 width="75px"
                                 height="75px" alt="Imagen"></td>
                        <td>{{ $about->created_by }}</td>
                        <td style="width: 150px;">
                            @can('quienes-somos.edit')
                                <a href="{{route('admin.content.quienes-somos.edit', $about->id)}}"
                                   class="btn btn-info btn-sm" data-toggle="tooltip" title="Editar"><i
                                            class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('quienes-somos.destroy')
                                <a href="" data-toggle="modal"
                                   data-route="{{route('admin.content.quienes-somos.destroy', $about->id)}}"
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

