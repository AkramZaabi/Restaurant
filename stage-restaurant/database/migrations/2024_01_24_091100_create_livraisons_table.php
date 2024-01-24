<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('Date');
            $table->string('lieu');
            $table->unsignedDouble('prix');
            $table->foreignId('id_product');
            $table->foreignId('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_product')->references('id')->on('plats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livraisons');
    }
}
