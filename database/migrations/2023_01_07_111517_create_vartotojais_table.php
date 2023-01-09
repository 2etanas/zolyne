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
            $table->string('Username');
            $table->string('Vardas');
            $table->string('Pavarde');
            $table->string('Gatvė');
            $table->string('NamoNr');
            $table->string('ButoNr');
            $table->string('Šalis');
            $table->string('PaštoKodas');
            $table->string('TelNumeris');
            $table->integer('teisiuID');
            
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
