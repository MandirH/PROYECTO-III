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
            $table->string("fecha_pub", 20);
            $table->string("hora_pub", 45);
            $table->string("pais_pub",100);
            $table->string("region_pub",100);
            $table->string("direc_pub",100);
            $table->string("texto_pub",1000);
            $table->string("tipo_pub",45);
            $table->string("img_pub",60)->nullable();
            $table->string("estado_pub",45);
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
