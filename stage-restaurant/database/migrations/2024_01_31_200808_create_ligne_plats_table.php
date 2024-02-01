<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignePlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_plats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('quantity');
            $table->unsignedDouble('prix_total');
            $table->foreignId('plat_id');
            $table->foreignId('livraison_id');
            $table->foreign('plat_id')->references('id')->on('plats');
            $table->foreign('livraison_id')->references('id')->on('livraisons');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligne_plats');
    }
}
