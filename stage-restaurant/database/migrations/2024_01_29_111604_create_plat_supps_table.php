<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatSuppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plat_supps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreign('num_plat');
            $table->foreign('num_supplement');
            $table->foreign('num_plat')->references('id')->on('plats');
            $table->foreign('num_supplement')->references('id')->on('supplements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plat_supps');
    }
}
