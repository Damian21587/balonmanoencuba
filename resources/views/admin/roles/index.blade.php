@extends('layouts.app')
@section('content')
    <section class="content-header">
        <x-btnlink-add href="{{route('admin.manager.roles.create')}}"/>
    </section>
    <section class="content">
        <x-content-index title=" {{ __('balonmano.ttl_role_listar')}}">
            <x-slot name="columns_header">
                <th>@ucfirst('balonmano.lbrol')</th>
                <th>@ucfirst('balonmano.lbcreadoPor')</th>
                <th class="text-center">@ucfirst('balonmano.acciones')</th>
            </x-slot>
            <x-slot name="columns_body">
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->created_by }}</td>
                        <td style="width: 130px;">
                            @can('roles.edit')
                                <a href="{{route('admin.manager.roles.edit', $role->id)}}"
                                   class="btn btn-info  btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('roles.destroy')
                                @if(Auth::user()->rol->id == $role->id)
                                    <button class="btn btn-default  btn-sm" disabled><i
                                                class="fa fa-trash"></i></button>
                                @else
                                    <a href="" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger  btn-sm"
                                       data-route="{{route('admin.manager.roles.destroy', $role->id)}}"><i
                                                class="fas fa-trash"></i></a>
                                @endif
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-content-index>
    </section>
@endsection