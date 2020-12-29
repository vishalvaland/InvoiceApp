<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
// 	if (Auth::guest()) {
// 		return Redirect::to('/login');
// 	} else {
// 		return view('/home');
// 	}
// });

// Route::get('/setting', function () {
// 	if (Auth::guest()) {
// 		return Redirect::to('/login');
// 	} else {
// 		return view('/setting');
// 	}
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
// Route::get('/setting', 'HomeController@setting')->name('setting');

// Route::get('/inventory', 'HomeController@inventory')->name('inventory');
// Route::get('/inventory-report', 'HomeController@inventoryreport')->name('inventory-report');

// Route::get('/customer', 'HomeController@customer')->name('customer');
// Route::get('/customer-report', 'HomeController@customerreport')->name('customer-report');

// Route::get('/invoice', 'HomeController@invoice')->name('invoice');
// Route::get('/invoice-report', 'HomeController@invoicereport')->name('invoice-report');

// Route::get('/dc', 'HomeController@dc')->name('dc');
// Route::get('/dc-report', 'HomeController@dcreport')->name('dc-report');

// Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('Customer/customer', 'CustomerController');
// });

Route::group(['middleware' => 'auth'], function () {
	Route::resource('customer', 'CustomerController');
	Route::resource('inventory', 'InventoryController');
	Route::resource('setting', 'SettingController');
	// Route::resource('invoice', 'InvoiceController');



	
// Route::post('/invoice/ajaxpost',function(Request $request){
//     // $task = Task::create($request->all());

//    $response = array(
//             'status' => 'success',
//             'msg' => 'Setting created successfully',
//         );
//         return \Response::json($response);
// });


Route::get('/invoice/create', 'InvoicenewController@create');
Route::get('/invoice/index', 'InvoicenewController@index');

// Route::get('/invoice/showinvoice/{id}', function ($id) {
//     return 'User '.$id;
// });
 Route::get('/invoice/showinvoice/{id}', 'InvoicenewController@showinvoice');
 Route::get('/invoice/showinvoicedc/{id}', 'InvoicenewController@showinvoicedc');

 Route::delete('/invoice/delete/{invoiceid}', 'InvoicenewController@destroy');


// Route::post('/invoice/create', 'InvoicenewController@posttata');


Route::get('/invoice/getitemlist', function(){
if(Request::ajax()){
	 $itemid= Request::get('itemid');

	//$itemid= Request::all();

    // $inventory = App\Inventory::all()

	 $inventory = App\Inventory::find($itemid);
   // $product = App\Inventory::find($product_id);
	return Response::json($inventory);
}

});


Route::get('/invoice/getcustomerlist', function(){
if(Request::ajax()){
	 $itemid= Request::get('itemid');

	//$itemid= Request::all();

    // $inventory = App\Inventory::all()

	 $customer = App\Customer::find($itemid);
   // $product = App\Inventory::find($product_id);
	return Response::json($customer);
}

});


Route::post('/invoice/postinvoice', function(){
   
if(Request::ajax()){ 
	// $inventory = App\Inventory::all();
   // $product = App\Inventory::find($product_id); 
     $itemid= Request::all();
    // var_dump( $itemid);
     $invoiceno= Request::get('invoiceno');
      $invoicedate= Request::get('invoicedate');
       $deliverydate= Request::get('dcdate');
        $customerid= Request::get('customerid');
         $modeofpayment= Request::get('modepayment');
          $roundoff= Request::get('roundoff');
          $totalamount= Request::get('totalall');
            $invocearrydatajason= Request::get('invocearrydatajason');
           

		  $id = DB::table('invoice_order')->insertGetId(
		     ['invoiceno' => $invoiceno,'invoicedate' => $invoicedate, 'deliverydate' => $deliverydate,'customerid' => $customerid, 'modeofpayment' => $modeofpayment,'roundoff' => $roundoff, 'totalamount' => $totalamount, 'invocearrydatajason' =>$invocearrydatajason  ]
		 );
    
    // Session::flash('flash_message', 'Invoice Saved!');

	 return Response::json($id);
}
});


// Route::post('/invoice/postinvoice', 'InvoicenewController@postinvoice');


   

});


