<?php 

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

Class VendaRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Venda';
    }

    public function createVenda($venda)
    {
    	return $this->model->create($venda);
    }

    public function getWithRelation()
    {
        return $this->model->with(['hasProduct','hasVps']);
    }
}