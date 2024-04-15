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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slugUser')->nullable(false)->unique();
            $table->string('fullName')->nullable(false);
            $table->string('sex')->nullable();
            $table->string('birthday')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('email')->nullable()->unique()->validate(['email' => 'email']);
            $table->tinyInteger('decentralization')->default(0);
            $table->string('password')->nullable();
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
        Schema::dropIfExists('users');
    }
};
