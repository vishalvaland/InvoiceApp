<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index(Request $request) {
		$keyword = $request->get('search');
		$perPage = 15;

		if (!empty($keyword)) {
			$customer = Customer::where('CustomerName', 'LIKE', "%$keyword%")
				->orWhere('CustomerAddress', 'LIKE', "%$keyword%")
				->orWhere('GSTNo', 'LIKE', "%$keyword%")
				->orWhere('MobileNo', 'LIKE', "%$keyword%")
				->orWhere('EMail', 'LIKE', "%$keyword%")
				->paginate($perPage);
		} else {
			$customer = Customer::paginate($perPage);
		}

		return view('customer.index', compact('customer'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create() {
		return view('customer.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'CustomerName' => 'required',
		]);
		$requestData = $request->all();

		Customer::create($requestData);

		Session::flash('flash_message', 'Customer added!');

		return redirect('customer');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 *
	 * @return \Illuminate\View\View
	 */
	public function show($id) {
		$customer = Customer::findOrFail($id);

		return view('customer.show', compact('customer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 *
	 * @return \Illuminate\View\View
	 */
	public function edit($id) {
		$customer = Customer::findOrFail($id);

		return view('customer.edit', compact('customer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update($id, Request $request) {
		$this->validate($request, [
			'CustomerName' => 'required',
		]);
		$requestData = $request->all();

		$customer = Customer::findOrFail($id);
		$customer->update($requestData);

		Session::flash('flash_message', 'Customer updated!');

		return redirect('customer');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function destroy($id) {
		Customer::destroy($id);

		Session::flash('flash_message', 'Customer deleted!');

		return redirect('customer');
	}
}
