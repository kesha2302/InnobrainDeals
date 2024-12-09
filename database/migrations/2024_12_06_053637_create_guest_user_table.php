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
        Schema::create('guest_user', function (Blueprint $table) {
            $table->id('guest_id');
            $table->string('guestorder_id',255);
            $table->string('name',255);
            $table->string('email',255);
            $table->bigInteger('contact');
            $table->string('payment_id',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_user');
    }
};
