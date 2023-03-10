<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVartotojaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vartotojais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('vardas')->index();
            $table->string('pavarde');
            $table->string('gatve');
            $table->string('namo_nr');
            $table->string('buto_nr');
            $table->string('miestas');
            $table->string('salis');
            $table->string('pasto_kodas');
            $table->string('tel_numeris');
            $table->text('komentaras');           
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
        Schema::dropIfExists('vartotojais');
    }
}
