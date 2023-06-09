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
        Schema::create('rended_books', function (Blueprint $table) {
            $table->id();

            $table->timestamp('return_limit_at');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('customer_id');
            $table->timestamp('returned_at')->nullable()->default(null);

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rended_books');
    }
};
