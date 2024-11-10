<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();                  // Mã người dùng, tự động tăng
            $table->string('username', 50)->unique(); // Tên đăng nhập, duy nhất
            $table->string('password', 255);         // Mật khẩu đã mã hóa
            $table->string('email', 100)->unique();  // Email, duy nhất
            $table->string('full_name', 100)->nullable();        // Họ và tên
            $table->string('phone_number', 15)->nullable();  // Số điện thoại
            $table->string('address', 255)->nullable();  // Địa chỉ
            $table->string('role', 50)->default('user');              // Vai trò (admin, employee)
            $table->timestamp('created_at')->nullable()->useCurrent(); // Ngày tạo
            $table->timestamp('updated_at')->nullable()->useCurrent(); // Ngày cập nhật
            $table->boolean('is_active')->default(true);  // Trạng thái tài khoản
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
