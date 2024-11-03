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
            $table->id('order_id');                      // Mã đơn hàng, tự động tăng
            $table->unsignedBigInteger('customer_id');   // Khóa ngoại tới bảng customers
            $table->dateTime('order_date');              // Ngày đặt hàng
            $table->decimal('total_amount', 10, 2);      // Tổng tiền đơn hàng
            $table->string('status', 50);                // Trạng thái đơn hàng
            $table->foreign('customer_id')->references('customer_id')->on('customers'); // Khóa ngoại
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
