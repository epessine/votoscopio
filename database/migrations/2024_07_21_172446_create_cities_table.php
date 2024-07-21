<?php

use App\Enums\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('code')->unique();
            $table->string('name');
            $table->string('slug');
            $table->enum('state', array_column(State::cases(), 'value'));
            $table->timestamps();

            $table->unique(['slug', 'state']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
