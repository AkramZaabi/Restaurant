<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneSuppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_supps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('supplement_id');
            $table->foreignId('ligneplat_id');
    
            $table->foreign('supplement_id')->references('id')->on('supplements');
            $table->foreign('ligneplat_id')->references('id')->on('ligne_plats');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligne_supps');
    }
}
