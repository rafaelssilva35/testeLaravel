<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Vps;
use App\Events\SnapshotCriado;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\InteractsWithSockets;

class Snapshot implements ShouldQueue,ShouldBroadcast
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, InteractsWithSockets;

    protected $int_vps_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($int_vps_id)
    {
        $this->int_vps_id = $int_vps_id;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // simula evento de snapshot "apenas retorna dados de vps"
        $vps = Vps::find($this->int_vps_id);

        // dispara evento usando Broadcast
        event(
            new SnapshotCriado("Snapshot de VPS ".$vps->str_vps_name. " IP ".$vps->str_ip_address. " 
                Feito com sucesso", $vps->int_vps_id
            )
        );
    }

    public function broadcastOn()
    {
        return 'sala-vps';
    }
}
