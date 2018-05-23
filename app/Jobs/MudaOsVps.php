<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Product;
use App\Events\MudouOsVps;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\InteractsWithSockets;

class MudaOsVps implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, InteractsWithSockets;

    protected $product;
    protected $os;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Product $product, $os)
    {
        $this->product = $product;
        $this->os = $os;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // simula ação de mudança de SO
        $product = $this->product;
        $product->os = $this->os;
        $product->save();

        $msg = "Sistema operaional de VPS "
                .$this->product->hasVps->str_vps_name.
                " IP ".$this->product->hasVps->str_ip_address.
                " alterado para ".$this->product->os;
                
        // dispara evento usando broadcast
        return event(
            new MudouOsVps($msg, $product->os, $product->int_product_id)
        );
    }

}
