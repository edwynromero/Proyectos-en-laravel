<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Articulo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ArticuloFormRequest;
use DB;

class ArticuloController extends Controller
{
        public function __construct()
    {

    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$articulo=DB::table('articulo as a')
    		->join('categoria as c', 'a.idcategoria','=','c.idcategoria')
    		->select('a.idarticulo', 'a.nombre','a.codigo','a.stock', 'c.nombre as categoria', 'a.descripcion','a.imagen','a.estado')
    		->where('nombre','LIKE','%'.$query.'%')
    		->orderBy('a.idarticulo','desc')
    		->paginate(7);
    		return view('almacen.articulo.index',["articulo"=>$articulo,"searchText"=>$query]);

    	}

    }
    public function create()
    {
    	return view('almacen.articulo.create');
    }
    public function store(CategoriaFormRequest $request)
    {
    	$Categoria= new Articulo;
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
