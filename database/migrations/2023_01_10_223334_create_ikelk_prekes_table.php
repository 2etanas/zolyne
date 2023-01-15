<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkelkPrekesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikelk_prekes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('preke_id');
            $table->string('preke_pavadinimas');
            $table->string('preke_aprasymas');
            $table->unsignedBigInteger('preke_kaina');
            $table->string('preke_foto1');
            $table->string('preke_foto2');
            $table->string('preke_foto3');
            $table->string('preke_foto4');
            // $table->string('name');
            // $table->string('size');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikelk_prekes');
    }
}
