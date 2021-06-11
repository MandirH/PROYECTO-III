<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id("id_com");
            $table->string("fecha_com", 20);
            $table->string("hora_com", 45);
            $table->string("texto_com",1000);
        });
        Schema::table('comentarios', function (Blueprint $table) {
            $table->unsignedBigInteger("pub_id_com");
            $table->foreign("pub_id_com")->references("id_pub")->on("publicacions");
            $table->unsignedBigInteger("user_id_com");
            $table->foreign("user_id_com")->references("id_user")->on("usuarios");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
