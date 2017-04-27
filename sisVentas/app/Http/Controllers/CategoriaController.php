<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$categoria=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('idcategoria','desc')
    		->paginate(7);
    		return view('almacen.categoria.index',["categoria"=>$categoria,"searchText"=>$query]);

    	}

    }
    public function create()
    {
    	return view('almacen.categoria.create');
    }
    public function store(CategoriaFormRequest $request)
    {
    	$Categoria= new Categoria;
    	$Categoria->nombre=$request->get('nombre');
    	$Categoria->descripcion=$request->get('descripcion');
    	$Categoria->condicion='1';
    	$Categoria->save();
    	return Redirect::to('almacen/categoria');
    }
    public function show()
    {
    	return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function edit($id)
    {
    	return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function update(CategoriaFormRequest $request, $id)
    {
    $categoria= Categoria::findOrFail($id);
    $categoria->nombre=$request->get('nombre');
    $categoria->descripcion=$request->get('descripcion');
	$categoria->update();
	return 	Redirect::to('almacen/categoria');    

    }
    public function destroy($id)
    {
    	$categoria=Categoria::findOrFail($id);
    	$categoria->condicion='0';
    	$categoria->update();
    	return Redirect::to('almacen/categoria');
    	
    }

}
