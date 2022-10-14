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
        Schema::create('ic_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('customer_title', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->string('ic_number');
            $table->smallInteger('ic_type_id');
            $table->date('ic_expiry_date');
            $table->smallInteger('customer_title_id');
            $table->text('address');
            $table->date('birth_date');
            $table->string('nationality');
            $table->foreign('ic_type_id')->references('id')->on('ic_type');
            $table->foreign('customer_title_id')->references('id')->on('customer_title');
            $table->index('ic_type_id');
        });
        Schema::create('number_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('number_status', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('number', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->smallInteger('number_type_id');
            $table->smallInteger('number_status_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('number_type_id')->references('id')->on('number_type');
            $table->foreign('number_status_id')->references('id')->on('number_status');
            $table->index('number');
            $table->index('number_type_id');
            $table->index('number_status_id');
        });
        Schema::create('imsi_status', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('imsi_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('imsi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('imsi');
            $table->smallInteger('imsi_status_id');
            $table->smallInteger('imsi_type_id');
            $table->timestamps();
            $table->softDeletes();
            $table->index('imsi');
            $table->index('imsi_type_id');
            $table->index('imsi_status_id');
            $table->foreign('imsi_status_id')->references('id')->on('imsi_status');
            $table->foreign('imsi_type_id')->references('id')->on('imsi_type');
        });
        Schema::create('package_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('package', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('number_id');
            $table->bigInteger('imsi_id');
            $table->date('installation_date');
            $table->date('expiry_date');
            $table->foreign('number_id')->references('id')->on('number');
            $table->foreign('imsi_id')->references('id')->on('imsi');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('subscription_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('subscription_status', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('subscription', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('number_id');
            $table->bigInteger('imsi_id')->nullable();
            $table->bigInteger('package_id')->nullable();
            $table->bigInteger('customer_id');
            $table->date('registration_date');
            $table->smallInteger('subscription_status_id');
            $table->smallInteger('subscription_type_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('package_id')->references('id')->on('package');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('imsi_id')->references('id')->on('imsi');
            $table->foreign('number_id')->references('id')->on('number');
            $table->index('package_id');
            $table->index('customer_id');
            $table->index('imsi_id');
            $table->index('number_id');
            $table->index('subscription_status_id');
            $table->index('subscription_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_status');
        Schema::dropIfExists('subscription_type');
        Schema::dropIfExists('subscription');
        Schema::dropIfExists('package');
        Schema::dropIfExists('package_type');
        Schema::dropIfExists('number');
        Schema::dropIfExists('number_type');
        Schema::dropIfExists('number_status');
        Schema::dropIfExists('imsi_type');
        Schema::dropIfExists('imsi_status');
        Schema::dropIfExists('imsi');
        Schema::dropIfExists('customer');
        Schema::dropIfExists('customer_title');
        Schema::dropIfExists('ic_type');
    }
};
