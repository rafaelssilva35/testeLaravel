<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vps extends Model
{
    protected $table = 'tbl_vps';

    protected $primaryKey = 'int_vps_id';
    public $timestamps = false;

    protected $fillable = ['int_product_id', 'str_ip_address', 'str_vps_name', 'bool_ligado'];
}
