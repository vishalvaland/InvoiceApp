<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Customer;
use App\Setting;
use App\Inventory;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Session;


class InvoicenewController extends Controller
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
            $invoice = Invoice::where('invoicedate', 'LIKE', "%$keyword%")
                 ->orWhere('invoiceno', 'LIKE', "%$keyword%")
                ->orWhere('deliverydate', 'LIKE', "%$keyword%")
                ->orWhere('customerid', 'LIKE', "%$keyword%")
                ->orWhere('modeofpayment', 'LIKE', "%$keyword%")
                ->orWhere('totaltaxamount', 'LIKE', "%$keyword%")
                // ->orWhere('statetax', 'LIKE', "%$keyword%")
                // ->orWhere('centraltax', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $invoice = Invoice::paginate($perPage);
        }

        return view('/invoice/index', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()

    {
         
        //  $settings = DB::table('settings')->get();
        //  $customers = DB::table('customers')->get();
        // return view('invoice.create',  ['settings' => $settings, 'customers' => $customers]);

            $invoicesetting = Invoice::all();
      
         $settings = DB::table('settings')->get();
         $customers = DB::table('customers')->get();
            $inventories = DB::table('inventories')->get();
        return view('invoice/create',  ['settings' => $settings, 'customers' => $customers, 'inventories' => $inventories]);
        // return view('invoice/create');


    }



    // public function posttata()

    // { 
    //       $invoicesetting = Invoice::all();
      
    //      $settings = DB::table('settings')->get();
    //      $customers = DB::table('customers')->get();


    //       $id = Input::get('title');
                     
    //         var_dump( $id);
    //         die();
             
    //         // dd $request;
    //          $response = array(
    //             'status' => 'success',
    //             'msg' => 'Setting created successfully',
    //         );

    //       // return \Response::json($response);
    //     // return view('invoice/create',  ['settings' => $settings, 'customers' => $customers, 'response'=> $response ]);
    //     // return view('invoice/create');


    // }


public function postinvoice(){

    // if(Request::ajax()){

    // return response()->json(Request::all());
     //return var_dump (Response::json(Request::all()));
    // }
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


        // return redirect('invoice.create', ['settings' => $settings, 'customers' => $customers]);
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


        return redirect('invoice/show');
    }


    public function showinvoice($id)
    {
        $invoice = Invoice::findOrFail($id);

         // return $invoice;
        //return response()->json( Invoice::findOrFail($id));
        $customerid= $invoice['customerid'];
         $allitems= $invoice['invocearrydatajason'];
        
             $customers = Customer::find($customerid);
         
              $settings = Setting::all();
           return view('invoice/showinvoice',['invoice' => $invoice, 'settings' => $settings, 'customers' => $customers,   'allitems' =>$allitems] );
        // return json $invoice;

            
    }


    public function showinvoicedc($id)
    {
        $invoice = Invoice::findOrFail($id);

         // return $invoice;
        //return response()->json( Invoice::findOrFail($id));
        $customerid= $invoice['customerid'];
         $allitems= $invoice['invocearrydatajason'];
        
             $customers = Customer::find($customerid);
         
              $settings = Setting::all();
           return view('invoice/showinvoicedc',['invoice' => $invoice, 'settings' => $settings, 'customers' => $customers,   'allitems' =>$allitems] );
        // return json $invoice;

            
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

       // return view('invoice.edit');
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

      // return redirect('invoice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($invoiceid)    
    {

       
      Invoice::destroy($invoiceid);

          Session::flash('flash_message', 'Invoice deleted!');

      return redirect('invoice/index');
    }
}
