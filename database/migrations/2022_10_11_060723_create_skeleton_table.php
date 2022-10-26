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
        Schema::create('ic_color', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('communication_channel', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('country', function (Blueprint $table) {
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
            $table->smallInteger('country_id');
            $table->smallInteger('ic_color_id');
            $table->foreign('country_id')->references('id')->on('country');
            $table->foreign('ic_color_id')->references('id')->on('ic_color');
            $table->foreign('ic_type_id')->references('id')->on('ic_type');
            $table->foreign('customer_title_id')->references('id')->on('customer_title');
            $table->index('country_id');
            $table->index('ic_color_id');
            $table->index('ic_type_id');
            $table->index('customer_title_id');
        });
        Schema::create('mukim', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('district', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('street');
            $table->string('simpang');
            $table->string('house_number');
            $table->string('postal_code');
            $table->smallInteger('district_id');
            $table->smallInteger('mukim_id');
            $table->timestamps();
            $table->string('block')->nullable();
            $table->string('floor')->nullable();
            $table->string('unit')->nullable();
            $table->string('building_name')->nullable();
            $table->foreign('district_id')->references('id')->on('district');
            $table->foreign('mukim_id')->references('id')->on('mukim');
            $table->index('district_id');
            $table->index('mukim_id');
        });
        Schema::create('address_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('customer_address', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->bigInteger('customer_id');
            $table->bigInteger('address_id');
            $table->smallInteger('address_type_id');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('address_id')->references('id')->on('address');
            $table->foreign('address_type_id')->references('id')->on('address');
            $table->index('customer_id');
            $table->index('address_id');
            $table->index('address_type_id');
        });
        Schema::create('contact_preference', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->bigInteger('customer_id');
            $table->smallInteger('communication_channel_id');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('communication_channel_id')->references('id')->on('communication_channel');
            $table->index('customer_id');
            $table->index('communication_channel_id');
        });
        Schema::create('number_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('number_status', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('number_category', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('number', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->smallInteger('number_type_id');
            $table->smallInteger('number_status_id');
            $table->smallInteger('number_category_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('number_type_id')->references('id')->on('number_type');
            $table->foreign('number_status_id')->references('id')->on('number_status');
            $table->foreign('number_category_id')->references('id')->on('number_category');
            $table->index('number');
            $table->index('number_type_id');
            $table->index('number_status_id');
            $table->index('number_category_id');
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
        Schema::create('product_network', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('product_profile', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('product_profile_id');
            $table->integer('product_network_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_profile_id')
                ->references('id')
                ->on('product_profile');
            $table->foreign('product_network_id')
                ->references('id')
                ->on('product_profile');
            $table->index('product_profile_id');
            $table->index('product_network_id');
        });
        Schema::create('pack_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });
        Schema::create('pack', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('number_id');
            $table->bigInteger('imsi_id')->nullable();
            $table->bigInteger('product_id');
            $table->smallInteger('pack_type_id')->nullable();
            $table->date('installation_date');
            $table->date('expiry_date');
            $table->foreign('number_id')->references('id')->on('number');
            $table->foreign('imsi_id')->references('id')->on('imsi');
            $table->foreign('pack_type_id')->references('id')->on('pack_type');
            $table->foreign('product_id')->references('id')->on('product');
            $table->index('number_id');
            $table->index('imsi_id');
            $table->index('product_id');
            $table->index('pack_type_id');
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
            $table->bigInteger('customer_id');
            $table->date('registration_date');
            $table->smallInteger('subscription_status_id');
            $table->smallInteger('subscription_type_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('subscription_status_id')
                ->references('id')
                ->on('subscription_status');
            $table->foreign('subscription_type_id')
                ->references('id')
                ->on('subscription_type');
            $table->index('customer_id');
            $table->index('subscription_status_id');
            $table->index('subscription_type_id');
        });
        Schema::create('subscription_number', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subscription_id');
            $table->bigInteger('number_id');
            $table->bigInteger('imsi_id');
            $table->date('activation_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('subscription_id')
                ->references('id')
                ->on('subscription');
            $table->foreign('number_id')->references('id')->on('number');
            $table->foreign('imsi_id')->references('id')->on('imsi');
            $table->index('subscription_id');
            $table->index('number_id');
            $table->index('imsi_id');
        });
        Schema::create('blacklist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('ic_number');
            $table->smallInteger('ic_type_id');
            $table->string('email');
            $table->foreign('ic_type_id')->references('id')->on('ic_type');
            $table->index('ic_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_number');
        Schema::dropIfExists('pack');
        Schema::dropIfExists('pack_type');
        Schema::dropIfExists('imsi');
        Schema::dropIfExists('imsi_type');
        Schema::dropIfExists('imsi_status');
        Schema::dropIfExists('contact_preference');
        Schema::dropIfExists('customer_address');
        Schema::dropIfExists('address');
        Schema::dropIfExists('address_type');
        Schema::dropIfExists('product');
        Schema::dropIfExists('product_profile');
        Schema::dropIfExists('product_network');
        Schema::dropIfExists('subscription');
        Schema::dropIfExists('subscription_status');
        Schema::dropIfExists('subscription_type');
        Schema::dropIfExists('number');
        Schema::dropIfExists('number_type');
        Schema::dropIfExists('number_status');
        Schema::dropIfExists('number_category');
        Schema::dropIfExists('customer');
        Schema::dropIfExists('customer_title');
        Schema::dropIfExists('blacklist');
        Schema::dropIfExists('ic_type');
        Schema::dropIfExists('ic_color');
        Schema::dropIfExists('communication_channel');
        Schema::dropIfExists('country');
        Schema::dropIfExists('mukim');
        Schema::dropIfExists('district');
    }
};
