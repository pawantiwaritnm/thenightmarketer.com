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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title');
            $table->text('short_desc');
            $table->text('long_desc');
            $table->string('adv_title');
            $table->text('adv_desc');
            $table->string('process_title');
            $table->text('process_desc');
            $table->string('docs_title');
            $table->text('docs_desc');
            $table->text('overview');
            $table->text('procedure');
            $table->date('date');
            $table->integer('sort');
            $table->string('meta_title');
            $table->string('meta_desc');
            $table->string('meta_keywords');
            $table->foreignId('service_category_id')->constrained('service_categories')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
