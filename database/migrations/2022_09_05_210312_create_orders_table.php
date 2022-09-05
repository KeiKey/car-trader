<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchased_by');
            $table->timestamp('canceled_at')->nullable();
            $table->unsignedBigInteger('canceled_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('purchased_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('canceled_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('order_vehicle', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->default(1);
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });

        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropForeign(['buyer_id']);

            $table->dropColumn('buyer_id');
            $table->dropColumn('bought_at');

            $table->unsignedBigInteger('deactivated_by')->nullable();
            $table->foreign('deactivated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropForeign(['deactivated_by']);
            $table->dropColumn('deactivated_by');

            $table->timestamp('bought_at')->nullable();
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('order_vehicle', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['vehicle_id']);
        });
        Schema::dropIfExists('order_vehicle');

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['purchased_by']);
            $table->dropForeign(['canceled_by']);
        });
        Schema::dropIfExists('orders');
    }
}
