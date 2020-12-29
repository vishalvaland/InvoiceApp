<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Company_Name', 'Company_Address', 'Company_Phone', 'Company_Mobile', 'GST_No'];




    // public function invoice()
    // {
    //     return $this->hasMany('App\Invoice');
    // }

    
}
