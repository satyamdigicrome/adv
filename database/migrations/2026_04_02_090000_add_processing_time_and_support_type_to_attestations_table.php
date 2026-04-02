<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('attestations', function (Blueprint $table) {
            $table->string('processing_time')->nullable()->after('country')->comment('e.g. 3-7 Days');
            $table->string('support_type')->nullable()->after('processing_time')->comment('e.g. Door-to-Door');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attestations', function (Blueprint $table) {
            $table->dropColumn(['processing_time', 'support_type']);
        });
    }
};
