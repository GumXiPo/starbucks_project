<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');                // Mã khách hàng, tự động tăng
            $table->string('name', 100);              // Tên khách hàng
            $table->string('phone', 20);              // Số điện thoại khách hàng
            $table->string('email', 100);             // Email của khách hàng
            $table->string('address', 255);           // Địa chỉ khách hàng
            $table->integer('loyalty_points')->default(0); // Điểm tích lũy, mặc định là 0
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
