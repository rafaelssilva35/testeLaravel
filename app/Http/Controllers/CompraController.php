<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VendaRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PaymentRepository;
use App\Jobs\Vps;

class CompraController extends Controller
{
	private $venda;
	private $product;
	private $payment;

	public function __construct(
		VendaRepository $venda,
		PaymentRepository $payment,
		ProductRepository $product
	) 
	{
		$this->venda = $venda;
		$this->product = $product;
		$this->payment = $payment;
	}

    public function getIndex()
    {
        $vpss = $this->venda->all();
        return view('index', compact('vpss'));
    }

    // guarda venda recebida e envia pra fila
    public function postCompra(Request $request) 
    {
        $request = (json_decode($request->compra));

    	$email = $request->email;
    	$order_id = $request->order_id;
    	$product = $this->product->createProduct(($request->products));
    	$payment = $this->payment->createPayment(($request->payment));

	    $venda = $this->venda->createVenda([
            'str_email'=>$email,
    		'order_id'=>$order_id,
    		"int_product_id"=>$product->int_product_id,
    		'int_payment_id'=>1
        ]);

        // envia job pra fila
        Vps::dispatch(
            $product->int_product_id
        );

        // retorna venda
        return $venda;
        // return redirect("vps/$venda->int_venda_id");
    }

    // retorna uma ou mais vps
    public function getCreate($int_venda_id = 0)
    {
        $vpss;
        
        if (!empty($int_venda_id)) {
            $vpss = $this->venda->getWithRelation()->where('int_venda_id', $int_venda_id)->get();
        } else {
            $vpss = $this->venda->getWithRelation()->get();
        }

        $vpss->each(function($item){
            return $item->hasProduct->addons = json_decode($item->hasProduct->addons);
        });
        
        return view('/create', compact('vpss'));
    }

}