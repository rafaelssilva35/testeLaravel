<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'int_product_id';
    protected $table = 'tbl_product';
    public $timestamps = false;

    protected $fillable = ['product_alias', 'os', 'addons'];

    public function hasVps()
    {
    	return $this->HasOne('App\Models\Vps','int_product_id','int_product_id');
    }
}
