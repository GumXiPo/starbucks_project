<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // 'id' tự động là BIGINT UNSIGNED
        $table->unsignedBigInteger('user_id'); // Khóa ngoại
        $table->string('name', 200);
        $table->string('email')->nullable();
        $table->text('note')->nullable();
        $table->decimal('total_amount', 10, 2);
        $table->timestamp('order_date')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->enum('status', ['pending', 'shipping', 'delivered', 'cancelled'])->default('pending');
        $table->timestamps();

        // Định nghĩa khóa ngoại
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders'); // Xóa bảng orders khi rollback migration
    }
}


