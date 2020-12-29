<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Inventory;
use Illuminate\Http\Request;
use Session;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $inventory = Inventory::where('itemname', 'LIKE', "%$keyword%")
				->orWhere('itemmodelnumber', 'LIKE', "%$keyword%")
				->orWhere('HSN_SAC', 'LIKE', "%$keyword%")
				->orWhere('quantity', 'LIKE', "%$keyword%")
				->orWhere('rate', 'LIKE', "%$keyword%")
				->orWhere('statetax', 'LIKE', "%$keyword%")
				->orWhere('centraltax', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $inventory = Inventory::paginate($perPage);
        }

        return view('inventory.index', compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'itemname' => 'required',
	 			'rate' => 'required',
			'statetax' => 'required',
			'centraltax' => 'required'
		]);
        $requestData = $request->all();
        
        Inventory::create($requestData);

        Session::flash('flash_message', 'Inventory added!');

        return redirect('inventory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $inventory = Inventory::findOrFail($id);

        return view('inventory.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);

        return view('inventory.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'itemname' => 'required',
			'HSN_SAC' => 'required',
			'rate' => 'required',
			'statetax' => 'required',
			'centraltax' => 'required'
		]);
        $requestData = $request->all();
        
        $inventory = Inventory::findOrFail($id);
        $inventory->update($requestData);

        Session::flash('flash_message', 'Inventory updated!');

        return redirect('inventory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Inventory::destroy($id);

        Session::flash('flash_message', 'Inventory deleted!');

        return redirect('inventory');
    }
}
