<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApmokejimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apmokejimas', function (Blueprint $table) {
            $table->id();
            $table->string('saskaitos_numeris');
            $table->string('pirkimo_id_saskaitai');
            $table->string('krepselio_id_saskaitai');
            $table->string('preke_id_saskaitai');
            $table->string('preke_pavadinimas_saskaitai');
            $table->string('preke_kaina_saskaitai');
            $table->string('preke_vienetai_saskaitai');
            $table->string('preke_total_saskaitai');
            $table->string('grandtotal_total_saskaitai');
            $table->string('mokejimo_tipas');
            $table->string('pristatymo_tipas_saskaitai');
            $table->string('galutine_suma');
            $table->string('pirkejo_vardas');
            $table->string('pirkejo_id');
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
        Schema::dropIfExists('apmokejimas');
    }
}
