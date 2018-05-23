<?php 

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

Class PaymentRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Payment';
    }

    public function createPayment($array)
    {
    	$payment = new $this->model;
    	$payment->date = $array->date;
    	$payment->value = $array->value;
    	$payment->unit = $array->unit;
    	$payment->method = $array->method;
    	$payment->months = $array->months;
    	$payment->save();
    	
    	return ['int_payment_id' => $payment->int_payment_id];
    }

}