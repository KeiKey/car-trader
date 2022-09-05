<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->unique();
            $table->string('make');
            $table->string('model');
            $table->integer('engine_size');
            $table->string('color');
            $table->integer('production_year');
            $table->decimal('price');
            $table->timestamp('bought_at')->nullable();
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->timestamp('deactivated_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('category_vehicle', function (Blueprint $table) {
            $table->id();
            $table->string('extra')->nullable();
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unique(['vehicle_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_vehicle', function (Blueprint $table) {
            $table->dropForeign(['vehicle_id']);
            $table->dropForeign(['category_id']);
        });

        Schema::dropIfExists('vehicles');
    }
}
