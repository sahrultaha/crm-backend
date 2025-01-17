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
        Schema::create('file_bulk_starter_pack', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('imsi');
            $table->smallInteger('pin');
            $table->integer('puk_1');
            $table->integer('puk_2');
            $table->string('ki')->nullable();
            $table->bigInteger('imsi_id')->nullable()->index();
            $table->bigInteger('file_id')->index();
            $table->smallInteger('imsi_type_id')->nullable()->index();
            $table->integer('number');
            $table->bigInteger('number_id')->nullable()->index();
            $table->string('product');
            $table->bigInteger('product_id')->nullable()->index();
            $table->smallInteger('row_status_id')->default(1)->index();
            $table->string('error')->nullable();

            $table->foreign('imsi_type_id')->references('id')->on('imsi_type');
            $table->foreign('imsi_id')->references('id')->on('imsi');
            $table->foreign('file_id')->references('id')->on('file');
            $table->foreign('number_id')->references('id')->on('number');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('row_status_id')->references('id')->on('row_status');
            $table->timestampsTz(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_bulk_starter_pack');
    }
};
