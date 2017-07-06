<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\Repositories\ClientRepository,
    App\Repositories\ProductRepository,
    App\Http\Requests;


class InvoiceController extends Controller
{
	private $clientRepo = null;
	private $productRepo = null;

	public function __construct(
		ClientRepository $clientRepo,
		ProductRepository $productRepo
		)
	{
		$this->clientRepo = $clientRepo;
		$this->productRepo = $productRepo;
	}
	public function save(Request $req)
	{
		$data = (object) [
	'iva' => $req->input('iva'),
	'subTotal' => $req->input('subTotal'),
	'total' => $req->input('total'),
	'client_id' => $req->input('client_id'),
	'detail' => $req->input('detail')
	]; 
	return $data;
	}

	public function index()
	{
		return view('invoice.index');
	}

	public function add()
	{
		return view('invoice.add');
	}

		public function findClient(Request $req)
	{
		return $this->clientRepo
					->findByName($req->input('a'));
	}

	public function findProduct(Request $req)
	{
		return $this->productRepo
					->findByName($req->input('a'));
	}

}
