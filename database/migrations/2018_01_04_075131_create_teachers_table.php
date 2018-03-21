<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('avatar_url')->nullable();
            $table->string('name');
            $table->enum('gender', ['Nữ', 'Nam']);
            $table->enum('subject', ['Toán học', 'Vật lý', 'Hóa học', 'Sinh học', 'Văn học', 'Lịch sử', 'Địa lý', 'Tiếng Anh']);
            $table->boolean('active')->default(1);
            $table->string('graduated_at')->nullable();
            $table->unsignedInteger('experience');
            $table->string('videolink')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedInteger('school_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
