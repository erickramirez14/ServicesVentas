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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('v_estado');
            $table->unsignedBigInteger('u_clave');
            $table->date('v_fecha');
            $table->timestamps();
            $table->foreign('u_clave')
            ->references('id')
            ->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropForeign("ventas_u_clave_foreign");
            $table->dropColumn("u_clave");
        });
        
        Schema::dropIfExists('ventas');
    }
};
