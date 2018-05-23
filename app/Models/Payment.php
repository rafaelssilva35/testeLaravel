<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey = 'int_payment_id';
    protected $table = 'tbl_payment';
    public $timestamps = false;

    protected $fillable = ['date', 'value', 'unit', 'method', 'months'];
}
