<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pools', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('city_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('organization');
            $table->string('code')->nullable();
            $table->string('source');
            $table->date('date');
            $table->float('nulls', 2);
            $table->float('no_response', 2);
            $table->integer('year');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pools');
    }
};
