<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Facturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('fac_id');
            $table->foreignId('prov_id')->references('prov_id')->on('provedor');
            
            $table->date('fac_fecha');
            $table->float('fac_total');
            
            $table->string('fac_tipo_pago');///Trasferencia Efectivo Tarjeta
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
