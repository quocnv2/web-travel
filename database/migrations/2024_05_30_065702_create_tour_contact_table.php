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
        Schema::create('tour_contact', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('email')->nullable()->validate(['email' => 'email']);
            $table->string('phone')->nullable(false);
            $table->integer('number_of_adults'); //số lượng người lớn
            $table->integer('number_of_children'); //số lượng trẻ nhỏ
            $table->string('travel_date'); // ngày đi
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
        Schema::dropIfExists('tour_contact');
    }
};
