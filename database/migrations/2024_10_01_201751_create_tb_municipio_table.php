<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMunicipioTable extends Migration

{
    public function up()
    {
        Schema::table('tb_municipio', function (Blueprint $table) {
            // Añade aquí las nuevas columnas
            // $table->string('nueva_columna')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tb_municipio', function (Blueprint $table) {
            // Si deseas revertir cambios, añade las columnas a eliminar aquí
            // $table->dropColumn('nueva_columna');
        });
    }
}
