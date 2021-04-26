<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('=coupon', function (Blueprint $table) {
            $table->increments('coupon_id');
            $table->text('coupon_name');
            $table->text('coupon_code');
            $table->integer('coupon_time');
            $table->integer('coupon_condition');
            $table->integer('coupon_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('=coupon');
    }
}
