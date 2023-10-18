<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            // inserisco le colonne del db
            $table->string('title',50);
            $table->text('description');
            $table->text('thumb');
            $table->float('price');
            $table->string('series',50);
            $table->date('sale_date');
            $table->string('type',50);

            // al mometno non inserisco "artists" e "writers", li passerò con una seconda migrazione dedicata

            // fine
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
        Schema::dropIfExists('comics');
    }
};