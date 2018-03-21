<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLophocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lophocs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('begin_at');
            $table->enum('status', ['Đã kết thúc', 'Đang diễn ra', 'Sắp diễn ra'])->default('Sắp diễn ra');
            $table->unsignedInteger('number_of_lesson')->default(20);
            $table->unsignedInteger('max_slot')->default(20);
            $table->decimal('price', 10, 0);
            $table->float('discount')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedInteger('teacher_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lophocs');
    }
}
