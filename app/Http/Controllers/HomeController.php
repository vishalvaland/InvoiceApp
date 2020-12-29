<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('home');
	}

	public function setting() {
		return view('setting');
	}

	public function inventory() {
		return view('inventory');
	}
	public function inventoryreport() {
		return view('inventory-report');
	}

	public function customer() {
		return view('customer');
	}
	public function customerreport() {
		return view('customer-report');
	}

	public function invoice() {
		return view('invoice');
	}

	public function invoicereport() {
		return view('invoice-report');
	}

	public function dc() {
		return view('dc');
	}

	public function dcreport() {
		return view('dc-report');
	}
}
