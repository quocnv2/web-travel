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
        Schema::create('room', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('slug')->nullable(false);
            $table->string('imgRoom')->nullable(false);
            $table->json('imageArray')->nullable(); //Danh sách ảnh
            $table->json('videoArray')->nullable(); //Danh sách video
            $table->longtext('content')->nullable(); //chi tiết
            $table->double('price')->default(0)->nullable();
            $table->double('weekendPrice')->default(0)->nullable(); // Giá Cuối Tuần
            $table->unsignedBigInteger('idCategory'); // danh mục vị trí
            $table->foreign('idCategory')->references('id')->on('categories')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
            $table->string('timeCreate');
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
        Schema::dropIfExists('room');
    }
};
