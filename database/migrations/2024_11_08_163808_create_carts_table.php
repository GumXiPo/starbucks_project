<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        // Tạo bảng carts
        Schema::create('carts', function (Blueprint $table) {
            $table->id(); // Tạo cột 'id' làm khóa chính
            $table->unsignedBigInteger('user_id'); // Khóa ngoại tham chiếu đến bảng users (nếu liên kết với người dùng)
            $table->string('status')->default('pending'); // Trạng thái giỏ hàng (ví dụ: 'pending', 'completed')
            $table->string('size')->nullable(); // Cột size cho giỏ hàng (nếu cần)
            $table->timestamps(); // Tạo các cột 'created_at' và 'updated_at'
    
            // Khóa ngoại đến bảng users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
