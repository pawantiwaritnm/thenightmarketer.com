<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payment_advices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('purpose');
            $table->string('invoice_no');
            $table->decimal('amount', 10, 2);
            $table->date('payment_date');
            $table->string('payment_mode');
            $table->string('filename');
            $table->string('reference_no')->nullable();
            $table->timestamp('added_on')->nullable()->after('updated_at');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_advices');
    }
};
