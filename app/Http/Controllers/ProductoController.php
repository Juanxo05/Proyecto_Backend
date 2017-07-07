<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest; // request personalizado creado para la validacion de datos del formulario

//Modelos a Utilizar

use App\Producto;
use App\Tipo; //Modelo tipo, hace referencia al tipo de producto

//Uso de Componentes
use Redirect; //Se utiliza para redireccionar a otra ruta
use Session; //Comunica mensajes hacia el cliente

class ProductoController extends Controller
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
        $this->middleware('auth');
    }


    public function index()
    {
        $productos = Producto::all(); // se obtienen todos los productos registrados en la base de datos
        $datos = array ();
        $contador = 0;
        //Obtendremos los valores de los productos y estos seran retornados a la vista
        foreach ($productos as $producto) {
            $tipo = Tipo::find($producto->id_tipo); // se busca el tipo especifico del producto, buscando el id
            // asigancion de valores
            $datos[$contador]["id"] = $producto->id_producto;
            $datos[$contador]["nombre"] = $producto->nombre;
            $datos[$contador]["tipo"] = $tipo->descripcion;
            $datos[$contador]["descripcion"]   = $producto->descripcion;
            $contador++;
        }
        // retorno de vista y datos que listara
        return view("/home", compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::all(); // se obtiene todos los tipo de Producto
        
        // retorno de vista y datos que listara
        return view("/createProduct",compact('tipos'));
    }

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
         if (Producto::create($request->all())) { 
            // se envia mensaje de confirmacion, (nombre, mensaje) es recivido por alerts.blade.php ubicado en resources/views
            Session::flash('message-success','Se ha ingresado el Producto');
        } else {
            // se envia mensaje de confirmacion, (nombre, mensaje) es recivido por alerts.blade.php ubicado en resources/views
           Session::flash('message-error','No se ha podido ingresar el registro');
        }
        
        // se retorna a la ruta 
        return Redirect::to('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id); // se busca el producto
        $tipos = Tipo::all(); //Se obtienen todos los tipos de producto
        // se retorna la vista  y los datos
        return view("/editProduct", compact('producto','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id); // Se busca el producto a actualizar
        $producto->fill($request->all()); // se rellenaran los atributos del objeto con sus respectivos datos
        
        // se guardan los cambios
        if ($producto->save()) {
            Session::flash('message-success','Registro Actualizado');
        } else {
           Session::flash('message-error','Error, no se ha podido actualizar registro');
        }
        
        return Redirect::to('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id); // se busca 
        if ($producto->delete()) {  // se elimina
            Session::flash('message-success','Registro eliminado');
        } else {
           Session::flash('message-error','No se ha podido eliminar el registro');
        }
        return Redirect::to('/productos');
    }
}
