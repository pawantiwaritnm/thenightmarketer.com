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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->longText('desc');
            $table->dateTime('date');
            $table->integer('sortOrder');
            $table->string('image');
            $table->string('metaTitle')->nullable();
            $table->string('metaKeyword')->nullable();
            $table->string('metaDesc')->nullable();
            $table->tinyInteger('status')->default(0);
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('cascade');
            $table->foreignId('blog_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('author_id')->constrained('admins')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
