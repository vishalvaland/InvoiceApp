<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Invoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
 use Session;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

   

    public function index()
    {
    //     $keyword = $request->get('search');
    //     $perPage = 25;

    //     if (!empty($keyword)) {
    //         $setting = Setting::where('Company_Name', 'LIKE', "%$keyword%")
				// ->orWhere('Company_Address', 'LIKE', "%$keyword%")
				// ->orWhere('Company_Phone', 'LIKE', "%$keyword%")
				// ->orWhere('Company_Mobile', 'LIKE', "%$keyword%")
				// ->orWhere('GST_No', 'LIKE', "%$keyword%")
				// ->paginate($perPage);
    //     } else {
    //         $setting = Setting::paginate($perPage);
    //     }
     $invoicesetting = Invoice::all();
      
         $settings = DB::table('settings')->get();
         $customers = DB::table('customers')->get();
        return view('invoice.create',  ['settings' => $settings, 'customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()

    {
         
         $settings = DB::table('settings')->get();
         $customers = DB::table('customers')->get();
        return view('invoice.create',  ['settings' => $settings, 'customers' => $customers]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
  //       $this->validate($request, [
		// 	'Company_Name' => 'required'
		// ]);
  //       $requestData = $request->all();
        
  //       Setting::create($requestData);

  //       Session::flash('flash_message', 'Setting added!');

         // $settings = DB::table('settings')->get();
         // $customers = DB::table('customers')->get();
        // return view('invoice.create',  );


        return redirect('invoice.create', ['settings' => $settings, 'customers' => $customers]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        // $setting = Setting::findOrFail($id);


        return redirect('invoice/create');
    }


    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // $setting = Setting::findOrFail($id);

       return view('invoice.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update()
    {
  //       $this->validate($request, [
		// 	'Company_Name' => 'required'
		// ]);
  //       $requestData = $request->all();
        
  //       $setting = Setting::findOrFail($id);
  //       $setting->update($requestData);

  //       Session::flash('flash_message', 'Setting updated!');

      return redirect('invoice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        // Setting::destroy($id);

        // Session::flash('flash_message', 'Setting deleted!');

        return redirect('invoice');
    }
}
