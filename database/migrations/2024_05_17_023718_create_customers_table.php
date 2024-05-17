<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('email');
            $table->string('phone')->nullable(false);
            $table->integer('number_of_adults'); //số lượng người lớn
            $table->integer('number_of_children'); //số lượng trẻ nhỏ
            $table->string('travel_date'); // ngày đi
            $table->string('tour_code'); //mã tour
            $table->string('tour_name'); // tên tour
            $table->string('tour_price'); // giá tour
            $table->string('hotel_name'); // tên khách sạn
            $table->string('room_code'); // mã phòng
            $table->double('total_price'); // tổng giá tour
            $table->text('note'); //ghi chú
            $table->text('feedback'); //phản hồi
            $table->string('status')->default(0);
            $table->timestamps();
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
};
