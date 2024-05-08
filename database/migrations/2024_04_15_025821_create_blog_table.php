<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable(false);
            $table->string('slug')->nullable(false);
            $table->string('imgBanner')->nullable(false);
            $table->json('imageArray')->nullable(); //Danh sách ảnh
            $table->json('videoArray')->nullable(); //Danh sách video
            $table->text('info_details_blog')->nullable(); //chi tiết
            $table->unsignedBigInteger('idCategory'); // danh mục vị trí
            $table->foreign('idCategory')->references('id')->on('categories')->onDelete('cascade');
            $table->string('codeTour')->nullable();
            $table->string('nameTour')->nullable();
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
        Schema::dropIfExists('blog');
    }
};
