<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidate_pool', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('candidate_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('pool_id')->constrained()->cascadeOnDelete();
            $table->float('percentage', 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidate_pool');
    }
};
