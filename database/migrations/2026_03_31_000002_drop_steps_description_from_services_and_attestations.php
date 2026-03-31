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
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('steps_description');
        });

        Schema::table('attestations', function (Blueprint $table) {
            $table->dropColumn('steps_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->longText('steps_description')->nullable()->after('long_description');
        });

        Schema::table('attestations', function (Blueprint $table) {
            $table->longText('steps_description')->nullable()->after('long_description');
        });
    }
};
