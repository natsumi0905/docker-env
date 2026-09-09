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
            $table->id();
            $table->string('name', 20);
            $table->string('company_name', 50)->nullable();
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->text('self_pr')->nullable();
            $table->text('career')->nullable();
            $table->string('tell', 15)->nullable();
            $table->tinyInteger('role')->default(0);
            $table->tinyInteger('del_flg')->default(0);
            $table->string('pass_token', 100)->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
