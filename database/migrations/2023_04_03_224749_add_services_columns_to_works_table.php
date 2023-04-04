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
        Schema::table('works', function (Blueprint $table) {
            $table->integer('service1')->nullable()->after('tags');
            $table->integer('service2')->nullable()->after('service1');
            $table->integer('service3')->nullable()->after('service2');
            $table->integer('service4')->nullable()->after('service3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn('service1');
            $table->dropColumn('service2');
            $table->dropColumn('service3');
            $table->dropColumn('service4');
        });
    }
};
