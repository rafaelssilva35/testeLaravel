<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Product;
use App\Events\VpsCriada;
use App\Models\Vps as MVps;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\InteractsWithSockets;

class Vps implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, InteractsWithSockets;

    protected $int_product_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($int_product_id)
    {
        $this->int_product_id = $int_product_id;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // guarda informaççoes de vps no banco
        $vps = MVps::create([
            'int_product_id' => $this->int_product_id,
            'str_ip_address' => $this->gerarIp(),
            'str_vps_name' => $this->geraName()
        ]);
        $msg = "VPS ".$vps->str_vps_name." criada IP ". $vps->str_ip_address;

        // dispara evento usando broadcast
        return event(
            new VpsCriada($msg)
        );
    }

    // simula legação de ip
    public function gerarIp()
    {
        $ip = '10.0.0.'.rand (1,254);

        if(MVps::where('str_ip_address', $ip)->first()) {
            return $this->gerarIp();   
        } else {
            return $ip;
        }
    }

    // gera nome para vps
    public function geraName()
    {
        $name = 'VPS-'.rand (1,254);
        if(MVps::where('str_vps_name', $name)->first()) {
            return $this->geraName();   
        } else {
            return $name;
        }  
    }

}
