<?php
namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Helper\ResponseBuilder;
use DB;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $producto = Producto::all();
        if( count($producto) > 0){
            return response()->json([$producto,'Status'=>'ok'],200);
        }else{
            return response()->json(['error'=>'Unauthorized'],200,[]);
        }
    }

    public function getProducto(Request $request,$nombre)
    {
        //cliente = Cliente.objects.all();
        $producto = Producto::where('nombre', $nombre)->first();
    
        if( count($producto) > 0){
            return response()->json([$producto,'Status'=>'ok'],200);
        }else{
            return response()->json(['error'=>'Unauthorized'],200,[]);
        }
    }
    

    
    public function setProducto(Request $request)
    {
        $producto = new Producto;
        $producto->precio=$request->precio;
        $producto->nombre=$request->nombre;
        $producto->existencia=$request->existencia;
        $producto->estado=$request->estado;
        $producto->date_created=$request->date_created;
        $producto->save();
        if($producto){
            return response()->json([$producto,'Status'=>'Registro Cliente guardado'],200);
        }else{
            return response()->json(['error'=>'Registro Cliente no realizado'],200,[]);
        }
    }

    public function updProducto(Request $request,$cedula)
    {
        $producto = Producto::where('nombre', $nombre)->first();
        $producto->precio=$request->precio;
        $producto->nombre=$request->nombre;
        $producto->existencia=$request->existencia;
        $producto->estado=$request->estado;
        $producto->date_created=$request->date_created;
        $producto->save();
        if($producto){
            return response()->json([$producto,'Status'=>'Registro Cliente guardado'],200);
        }else{
            return response()->json(['error'=>'Registro Cliente no realizado'],200,[]);
        }
    }

    public function deleteProducto($cedula)
    {
        $producto = Producto::where('nombre', $nombre)->first();
        $cliente->delete();
    }


}
