<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id("id_re");
            $table->string("usuario_re", 45);
            $table->string("autor_re", 45);
            $table->string("publicacion_re",45)->nullable();
            $table->string("comentario_re",45)->nullable();
            $table->string("texto_re", 100);
            $table->string("estado_re",45);
        });
        Schema::table('reportes', function (Blueprint $table) {
            $table->unsignedBigInteger("id_usuario_re");
            $table->foreign("id_usuario_re")->references("id_user")->on("usuarios");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
