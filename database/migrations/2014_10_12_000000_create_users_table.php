<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //$table->string('first_name'); // Ep14
            // $table->string('last_name'); // Ep14
            $table->string('name');  //Ep13, Ep15, Ep16, Ep17, Ep18, Ep19
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            // $table->string('town')->nullable();  Ep19
            $table->string('password');
            $table->rememberToken();
            // $table->boolean('is_owner')->default(false); Ep13
            // $table->index(['first_name', 'last_name']); Ep14
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
    }
};
