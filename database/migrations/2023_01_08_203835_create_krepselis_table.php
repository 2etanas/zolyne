<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrepselisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krepselis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pirkimo_id'); //neunikalus, vieno apsipirkimo/rinkimosi metu priskiriamas vienas, zmogus ateina, susikuria cookies su pirkimo_id, tada pridejus preke i krepseli irasomas ID
           
            $table->unsignedBigInteger('vartotojas_id');
            $table->foreign('vartotojas_id')->references('id')->on('users');
           
            $table->unsignedBigInteger('preke_id')->unsigned();
            $table->foreign('preke_id')->references('id')->on('ikelk_prekes')->onDelete('cascade');
            $table->unsignedBigInteger('preke_kaina');
            // $table->foreign('preke_kaina')->references('preke_kaina')->on('prekes');
            $table->unsignedBigInteger('preke_vienetai');
            $table->unsignedBigInteger('preke_total');
            $table->unsignedBigInteger('ar_apmoketa'); // 0 - ne, 1 - taip
           
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
        Schema::dropIfExists('krepselis');
    }
}
