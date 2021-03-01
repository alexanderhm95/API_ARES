<?php
namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Helper\ResponseBuilder;
use DB;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $cliente = Cliente::all();
        if( count($cliente) > 0){
            return response()->json([$cliente,'Status'=>'ok'],200);
        }else{
            return response()->json(['error'=>'Unauthorized'],200,[]);
        }
    }

    public function getCliente(Request $request,$cedula)
    {
        //cliente = Cliente.objects.all();
        $cliente = Cliente::where('cedula', $cedula)->first();
    
        if( $cliente){
            return response()->json([$cliente,'Status'=>'Registro Cliente encontrado'],200);
        }else{
            return response()->json(['error'=>'Registro Cliente no encontrado'],200,[]);
        }
    }
    

    
    public function setCliente(Request $request)
    {
        $cliente = new Cliente;
        $cliente->cedula=$request->cedula;
        $cliente->nombres=$request->nombres;
        $cliente->apellidos=$request->apellidos;
        $cliente->genero=$request->genero;
        $cliente->correo=$request->correo;
        $cliente->celular=$request->celular;
        $cliente->direccion=$request->direccion;
        $cliente->date_created=$request->date_created;
        $cliente->save();
        if($cliente){
            return response()->json([$cliente,'Status'=>'Registro Cliente guardado'],200);
        }else{
            return response()->json(['error'=>'Registro Cliente no realizado'],200,[]);
        }
    }

    public function updCliente(Request $request,$cedula)
    {
        $cliente = Cliente::where('cedula', $cedula)->first();
        $cliente->cedula=$request->cedula;
        $cliente->nombres=$request->nombres;
        $cliente->apellidos=$request->apellidos;
        $cliente->genero=$request->genero;
        $cliente->correo=$request->correo;
        $cliente->celular=$request->celular;
        $cliente->direccion=$request->direccion;
        $cliente->date_created=$request->date_created;
        $cliente->save();
        if($cliente){
            return response()->json([$cliente,'Status'=>'Registro Cliente guardado'],200);
        }else{
            return response()->json(['error'=>'Registro Cliente no realizado'],200,[]);
        }
    }

    public function deleteCliente($cedula)
    {
        $cliente = Cliente::where('cedula', $cedula)->first();
        $cliente->delete();
    }


}
