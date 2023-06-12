<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', '250')->nullable(false)->unique('email');
            $table->string('password')->nullable(false);
            $table->string('avatar')->default('user.svg');
            $table->string('rememberToken')->nullable(true);
            $table->timestamps();
            $table->string('role')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
