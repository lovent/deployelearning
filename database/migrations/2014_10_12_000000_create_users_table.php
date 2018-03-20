<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_name');
            $table->boolean('active')->default(1);
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->enum('gender', ['Nữ', 'Nam'])->nullable();
            $table->enum('rule', ['1', '2'])->default(2);
            $table->string('avatar_url')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->rememberToken('remember_token')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedInteger('school_id')->nullable();
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
