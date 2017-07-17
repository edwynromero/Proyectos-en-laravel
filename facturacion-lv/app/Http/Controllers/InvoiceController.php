<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\Repositories\ClientRepository,
    App\Repositories\ProductRepository,
     App\Repositories\InvoiceRepository,
    App\Http\Requests;


class InvoiceController extends Controller
{
	private $clientRepo = null;
	private $productRepo = null;
	private $invoiceRepo = null;

	public function __construct(
		ClientRepository $clientRepo,
		ProductRepository $productRepo,
		InvoiceRepository $invoiceRepo
		)
	{
		$this->clientRepo = $clientRepo;
		$this->productRepo = $productRepo;
		$this->invoiceRepo = $invoiceRepo;
	}
	
	public function index()
	{
		return view('invoice.index');
	}

	public function add()
	{
		return view('invoice.add');
	}

	public function save(Request $req)
	{
		$data = (object) [
	'iva' => $req->input('iva'),
	'subTotal' => $req->input('subTotal'),
	'total' => $req->input('total'),
	'client_id' => $req->input('client_id'),
	'detail' => []
	]; 
	foreach ($req->input('detail') as $d) {
		$data->detail[] = (object)[
		'product_id' => $d['id'],
		'quantity' => $d['quantity'],
		'unitPrice' => $d['price'],
		'total' => $d['total'],
		];
	}
	return $this->invoiceRepo->save($data);
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
