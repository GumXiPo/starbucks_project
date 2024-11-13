<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();                                  // Mã phản hồi, tự động tăng
            $table->unsignedBigInteger('user_id');         // Mã người dùng (liên kết với bảng users)
            $table->unsignedBigInteger('product_id');      // Mã sản phẩm (liên kết với bảng products)
            $table->integer('rating')->default(1);         // Đánh giá từ 1-5
            $table->text('comment');                       // Nội dung phản hồi
            $table->timestamps();                          // Thời gian tạo và cập nhật

            // Thiết lập khóa ngoại liên kết với bảng users và products
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
