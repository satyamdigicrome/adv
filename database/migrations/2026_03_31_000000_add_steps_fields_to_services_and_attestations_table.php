<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('steps_image')->nullable()->after('main_image');
            $table->longText('steps_description')->nullable()->after('steps_image');
        });

        Schema::table('attestations', function (Blueprint $table) {
            $table->string('steps_image')->nullable()->after('main_image');
            $table->longText('steps_description')->nullable()->after('steps_image');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['steps_image', 'steps_description']);
        });

        Schema::table('attestations', function (Blueprint $table) {
            $table->dropColumn(['steps_image', 'steps_description']);
        });
    }
};