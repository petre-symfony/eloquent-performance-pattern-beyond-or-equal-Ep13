<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        /** Ep17
        Schema::create('logins', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('ip_address', 50);
            $table->timestamps();

        });
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        /** Ep17
        Schema::dropIfExists('logins');
         *
         */
    }
};
