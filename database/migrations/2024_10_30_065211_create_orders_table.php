<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();  // Tạo cột id tự động tăng
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Liên kết với bảng 'users' và xóa khi người dùng bị xóa
            $table->string('name'); // Tên của người đặt hàng
            $table->string('email'); // Email của người đặt hàng
            $table->text('note')->nullable(); // Ghi chú về đơn hàng, có thể để trống
            $table->decimal('total_amount', 10, 2); // Tổng tiền của đơn hàng, độ dài 10, độ chính xác 2
            $table->timestamp('order_date')->useCurrent(); // Ngày giờ tạo đơn hàng
            $table->string('status', 50)->default('pending'); // Trạng thái đơn hàng, mặc định là 'pending'
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders'); // Xóa bảng orders khi rollback migration
    }
}


