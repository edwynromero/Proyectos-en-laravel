<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\Repositories\ClientRepository,
    App\Http\Requests;


class InvoiceController extends Controller
{
	private $clientRepo = null;

	public function __construct(ClientRepository $clientRepo)
	{
		$this->clientRepo = $clientRepo;
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


}
