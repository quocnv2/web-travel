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
            $table->string('email')->nullable()->unique()->validate(['email' => 'email']);
            $table->string('phone')->nullable(false);
            $table->integer('number_of_adults'); //số lượng người lớn
            $table->integer('number_of_children'); //số lượng trẻ nhỏ
            $table->string('travel_date'); // ngày đi
            $table->string('tour_code')->nullable(true); //mã tour
            $table->string('tour_name')->nullable(true); // tên tour
            $table->double('tour_price')->nullable(true); // giá tour
            $table->double('total_tour_price')->nullable(true); // giá tour
            $table->string('hotel_name')->nullable(true); // tên khách sạn
            $table->string('room_code')->nullable(true); // mã phòng
            $table->double('room_price')->nullable(true); // mã phòng
            $table->double('total_room_price')->nullable(true); // giá tour
            $table->double('total_price')->nullable() ; // tổng giá tour

            $table->text('note')->nullable(); //ghi chú
            $table->text('feedback')->nullable(true); //phản hồi
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
