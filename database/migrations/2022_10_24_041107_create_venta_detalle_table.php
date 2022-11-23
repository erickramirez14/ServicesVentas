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
        Schema::create('venta_detalles', function (Blueprint $table) {
            $table->unsignedBigInteger('v_clave');
            $table->unsignedBigInteger('p_clave');
            $table->integer('p_cantidad');
            $table->double('p_costo');
            $table->timestamps();
            $table->foreign('v_clave')
            ->references('id')
            ->on('ventas');
            $table->foreign('p_clave')
            ->references('id')
            ->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('venta_detalles', function (Blueprint $table) {
            $table->dropForeign("venta_detalles_v_clave_foreign");
            $table->dropColumn("v_clave");
        });

        Schema::table('venta_detalles', function (Blueprint $table) {
            $table->dropForeign("venta_detalles_p_clave_foreign");
            $table->dropColumn("p_clave");
        });

        Schema::dropIfExists('venta_detalles');
    }
};
