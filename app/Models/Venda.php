<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'tbl_venda';

    protected $primaryKey = 'int_venda_id';
    public $timestamps = false;

    protected $fillable = ['order_id', 'str_email', 'int_payment_id', 'int_product_id'];

    public function hasProduct()
    {
        // dd(array($this->HasOne('App\Models\Product','int_product_id','int_product_id')->get()[0]['addons']));
        return $this->HasOne('App\Models\Product','int_product_id','int_product_id'); 
    }

    public function hasVps()
    {
    	return $this->HasOne('App\Models\Vps','int_product_id','int_product_id');
    }
}
