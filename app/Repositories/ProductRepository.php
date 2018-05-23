<?php 

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

Class ProductRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Product';
    }

    public function createProduct($product)
    {
        // dd(json_decode($product));
        $array = ($product);
        $producto = new $this->model;
        $producto->product_alias = $array->product_alias;
        $producto->os = $array->os;
        $producto->addons = json_encode($array->addons);
        $producto->save();
        
        return $producto;
    	// return ['int_product_id' => $producto->int_product_id];
    }

    public function mudaOs($int_vps_id, $os)
    {
        $vps = $this->model->find($int_vps_id);
        $vps->os = '';
        $vps->save();
        return $vps;
    }


}