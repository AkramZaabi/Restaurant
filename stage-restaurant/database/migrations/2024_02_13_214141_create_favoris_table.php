<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoris', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')  ; 
            $table->foreignId('plat_id')  ; 
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('plat_id')->references('id')->on('plats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favoris');
    }
}
