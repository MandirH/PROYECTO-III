<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->id("id_pub");
            $table->string("fecha_pub");
            $table->string("hora_pub");
            $table->string("pais_pub");
            $table->string("region_pub");
            $table->string("direc_pub");
            $table->string("texto_pub");
            $table->string("tipo_pub");
            $table->string("estado_pub");
        });
        Schema::table('publicacions', function (Blueprint $table) {
            $table->unsignedBigInteger("usuarios_id_user");
            $table->foreign("usuarios_id_user")->references("id_user")->on("usuarios");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacions');
    }
}
