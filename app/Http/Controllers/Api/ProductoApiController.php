<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest; // request personalizado creado para la validacion de datos del formulario

//Modelos a Utilizar

use App\Producto;
use App\Tipo; //Modelo tipo, hace referencia al tipo de producto

//Uso de Componentes
use Redirect; //Se utiliza para redireccionar a otra ruta
use Session; //Comunica mensajes hacia el cliente

class ProductoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Constructor
    public function __construct()
    {   
        // utiliza el middleware auth
        //$this->middleware('auth');
    }


    public function index()
    {
        return Producto::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  Implementamos un Request personalizado para las validaciones.
     */
    public function store(ProductoRequest $request)
    {
            
        // creacion y a su vez validacion si el recurso se creo correctamente
        $producto = Producto::create($request->all());
        if (!isset($producto)) { 
            $datos = [
            'errors' => true,
            'msg' => 'No se creo producto',
            ];
            $producto = \Response::json($datos, 404);
        }         
        // se retorna a la ruta 
        return $producto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        if (!isset($producto)) {
            $datos = [
            'errors' => true,
            'msg' => 'No se encontró el producto con ID = ' . $id,
            ];
            $producto = \Response::json($datos, 404);
        }
        return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id); // busqueda de la producto a actualizar
        $producto->fill($request->all()); // se rellenaran los atributos del objeto con sus respectivos datos
        $productoRetorno = $producto->save();
        // se guardan los cambios
        if (isset($producto)) {
            $producto = \Response::json($productoRetorno, 200);
        } else {
           $producto = \Response::json(['error' => 'No se ha podido actualizar el producto'], 404);
        }
        return $producto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id); // se busca la producto
        if ($producto->delete()) {  // se elimina
            $producto = \Response::json(['delete' => true, 'id' => $id], 200);
        } else {
           $producto = \Response::json(['error' => 'No se ha podido eliminar el producto'], 403);
        }
        return $producto;
    }
}