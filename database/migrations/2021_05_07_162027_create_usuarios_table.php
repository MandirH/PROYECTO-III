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
            $table->string("nom_user",100);
            $table->string("ape_user",100);
            $table->string("sex_user",45);
            $table->string("pais_user",100);
            $table->string("nacionalidad_user",100);
            $table->string("email_user",100)->unique();
            $table->string("password",100);
            $table->string("cargo_user",25);
            $table->string("estado_user",25);
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
