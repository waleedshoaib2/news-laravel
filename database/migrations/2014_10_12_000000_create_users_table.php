<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('username');
    $table->string('email')->unique();
    $table->string('password');
    $table->unsignedBigInteger('user_role_id');
    $table->timestamps();
    $table->foreign('user_role_id')->references('id')->on('user_roles');
    });
    }



    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
