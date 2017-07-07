@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Productos Ingresados</div>
                <div class="col-md-10 col-md-offset-1">
                    <br>
                    {{--  se incluye las alertas --}}
                    @include('alerts')
                </div>

                <div class="panel-body">
                    <div class="col-md-4 col-md-offset-8">
                        <a class="btn btn-primary btn-block" href='/productos/create'>Nuevo Producto</a>
                    </div>
                    @foreach($datos as $dato) 
                        <div class="col-md-10 col-md-offset-1">
                            {{-- Se listaran los datos obtenidos como arreglo --}}
                            <h3>{{ $dato['nombre'] }}</h3>
                            <h4>Descripcion: {{ $dato['descripcion'] }}</h4>
                            <h4>Tipo: {{ $dato['tipo'] }}</h4>
                            <br>
                            <div class="col-md-8 col-md-offset-2" style="float: bottom;">
                                <div class="col-md-6">
                                    <a class="btn btn-success btn-md btn-block" href='/productos/{{ $dato['id'] }}/edit'>Editar</a>{{-- ruta que hace referencia al edit de productos --}}
                                </div>
                                <div class="col-md-6">
                                    <form method="POST" action="{{ url('/productos/'.$dato['id']) }}">
                                        <input type="hidden" name="_method" value="DELETE"> {{-- Se requiere especificar un input de este tipo para enviar una peticion de tipo DELETE --}}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-danger btn-block" value="Eliminar">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <hr>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>

</div>
@endsection