<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Client;

class InvoiceController extends Controller
{
	private $client = null;

	public function __CONSTRUCT()
	{
		$this->client = new Client();
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
		return $this->client
					->findByName($req->input('a'));
	}


}
