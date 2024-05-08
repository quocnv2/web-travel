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
        Schema::create('commen_blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable(false);
            $table->string('phone')->nullable();
            $table->string('email')->nullable()->validate(['email' => 'email']);
            $table->text('commentUser')->default(null);
            $table->tinyInteger('status')->default(0);
            $table->text('commentAdmin')->default(null);
            $table->unsignedBigInteger('idBlog');
            $table->foreign('idBlog')->references('id')->on('blog')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commen_blog');
    }
};
