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
        Schema::table('role_permissions', function (Blueprint $table) {
            $table->boolean('can_view')->default(0)->after('permission_id');
            $table->boolean('can_add')->default(0)->after('can_view');
            $table->boolean('can_edit')->default(0)->after('can_add');
            $table->boolean('can_delete')->default(0)->after('can_edit');
            $table->boolean('can_export')->default(0)->after('can_delete');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('role_permissions', function (Blueprint $table) {
            $table->dropColumn(['can_view', 'can_add', 'can_edit', 'can_delete', 'can_export']);
        });
    }
};
