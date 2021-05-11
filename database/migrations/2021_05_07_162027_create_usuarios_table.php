<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id("id_user");
            $table->string("nom_user");
            $table->string("ape_user");
            $table->string("sex_user");
            $table->integer("DNI_user");
            $table->integer("telf_user");
            $table->string("email_user");
            $table->string("contra_user");
            $table->string("cargo_user");
            $table->string("estado_user");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
