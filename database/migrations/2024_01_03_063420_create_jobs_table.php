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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('description',1000);
            $table->decimal('salary',10);
            $table->string('image',50);
            $table->string('tag',200);
            $table->boolean('availability')->default(0)->nullable();
            $table->tinyInteger('vacancy');
            $table->tinyInteger('category_id');
            $table->tinyInteger('location_id');
            $table->tinyInteger('industry_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
