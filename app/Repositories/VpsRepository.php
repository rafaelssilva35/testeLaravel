<?php 

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

Class VpsRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Vps';
    }

    public function liga($int_vps_id)
    {
    	$vps = $this->model->find($int_vps_id);
    	$vps->bool_ligado = 1;
        $vps->save();
    	return $vps; 
    }

    public function desliga($int_vps_id)
    {
    	$vps = $this->model->find($int_vps_id);
    	$vps->bool_ligado = 0;
        $vps->save();
    	return $vps; 
    }

}