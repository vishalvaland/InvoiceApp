<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	  protected $table = 'invoice_order';

	/**
	 * The database primary key value.
	 *
	 * @var string
	 */
	 protected $primaryKey = 'invoiceid';

	/**
	 * Attributes that should be mass-assignable.
	 *
	 * @var array
	 */
	 protected $fillable = ['invoiceno','invoicedate', 'deliverydate', 'customerid', 'modeofpayment', '	roundoff','totalamount', 'totalamountword', 'totaltaxamount', 'totaltaxamountword','invocearrydatajason'];



	 // public function setting()
  //   {
  //       return $this->belongsTo('App\Setting');
  //   }

    // public function itemdata()
    // {
    //     return $this->belongsTo('App\Models\Category');
    // }



    
}
