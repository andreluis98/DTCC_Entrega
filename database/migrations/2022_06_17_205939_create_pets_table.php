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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("title");
            $table->text("description");
            $table->string("city");
            $table->boolean("sex");
            $table->boolean("category");
            $table->string("endereço");
            $table->integer("number");
            $table->string("complemento");
            $table->text("refere");
            $table->string("nomeSol");
            $table->string("SobrenomeSol");
            $table->string("contato");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
};
