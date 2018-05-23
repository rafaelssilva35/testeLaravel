<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VpsRepository;
use App\Repositories\ProductRepository;
use App\Jobs\LigaVps;
use App\Jobs\MudaOsVps;
use App\Jobs\Snapshot;


class VpsController extends Controller
{
	private $vps;
	private $product;

    public function __construct(VpsRepository $vps, ProductRepository $product)
    {
    	$this->vps = $vps;
    	$this->product = $product;
    }

    // simula procedimento de reiniciar uma vps
    public function postReinicia($int_vps_id)
    {
    	$vps = $this->vps->desliga($int_vps_id);
    	
        // envia job pra fila em App\Jobs\LigaVps e em LigaVps usa Broadcast
    	LigaVps::dispatch($vps);
    }

    // simula procedimento de mudança de OS 
    public function postChangeOs($int_vps_id, $os)
    {
        $product = $this->product->mudaOs($int_vps_id, $os);

        // envia job pra fila em App\Jobs\MudaOsVps e em MudaOsVps usa Broadcast
        MudaOsVps::dispatch($product, $os);
    }

    // simula procedimento de snapshot
    public function postSnapshot($int_vps_id)
    {
        // envia job pra fila em App\Jobs\Snapshot e em Snapshot usa Broadcast
    	Snapshot::dispatch($int_vps_id);
    }
}
