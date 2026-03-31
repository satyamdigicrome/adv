<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            if (!Schema::hasColumn('services', 'steps')) {
                $table->json('steps')->nullable()->after('steps_description')->comment('JSON array of steps: [{heading, description, image}, ...]');
            }
        });

        Schema::table('attestations', function (Blueprint $table) {
            if (!Schema::hasColumn('attestations', 'steps')) {
                $table->json('steps')->nullable()->after('steps_description')->comment('JSON array of steps: [{heading, description, image}, ...]');
            }
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            if (Schema::hasColumn('services', 'steps')) {
                $table->dropColumn('steps');
            }
        });

        Schema::table('attestations', function (Blueprint $table) {
            if (Schema::hasColumn('attestations', 'steps')) {
                $table->dropColumn('steps');
            }
        });
    }
};