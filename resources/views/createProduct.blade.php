
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Nuevo Producto</div>
                @include('errores')
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/productos') }}">
                        {{ csrf_field() }} {{--  token necesario para realizar la consulta --}}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_tipo" class="col-md-4 control-label">Tipo de Producto</label>
                            <div class="col-md-6">
                                <select class="form-control" name="id_tipo" >
                                 {{--  se recorreran los tipos enviados desde el servidor --}}
                                   @foreach ($tipos as $tipo)
                                         <option value="{{ $tipo->id_tipo }}">{{ $tipo->descripcion }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="col-md-4 control-label">Descripcion de Producto</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="descripcion" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            	<a class="btn btn-default btn-md" href='/productos'>Volver</a>
                                <button type="submit" class="btn btn-primary">
                                    Ingresar Producto
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection