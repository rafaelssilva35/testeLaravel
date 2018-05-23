<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Events\VpsLigada;
use App\Models\Vps as MVps;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\InteractsWithSockets;

class LigaVps implements ShouldQueue,ShouldBroadcast
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, InteractsWithSockets;

    protected $vps;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(MVps $vps)
    {
        $this->vps = $vps;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // simula ação de ligar vps
        $vps = $this->vps;
        $vps->bool_ligado = 1;
        $vps->save();

        // dispara evento
        event(
            new VpsLigada("VPS ".$this->vps->str_vps_name. " IP ".$this->vps->str_ip_address. " 
                Reiniciada com sucesso", $vps->int_vps_id
            )
        );
    }

    public function broadcastOn()
    {
        return 'sala-vps';
    }
}
