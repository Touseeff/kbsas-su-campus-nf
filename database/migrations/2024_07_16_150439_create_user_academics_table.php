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
        Schema::create('user_academics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('matricCategory','200')->nullable();
            $table->string('matricYear','100')->nullable();
            $table->string('matricPercentage','100')->nullable();
            $table->string('matricCertificate','300')->nullable();
            $table->string('InterCategory','200')->nullable();
            $table->string('InterYear','100')->nullable();
            $table->string('InterPercentage','100')->nullable();
            $table->string('InterCertificate','300')->nullable();
            $table->string('AcademicStatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_academics');
    }
};
