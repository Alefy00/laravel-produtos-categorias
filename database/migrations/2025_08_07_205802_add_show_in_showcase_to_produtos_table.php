<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->boolean('show_in_showcase')->default(false)->after('category_id');
            $table->index('show_in_showcase');
        });
    }

    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropIndex(['show_in_showcase']);
            $table->dropColumn('show_in_showcase');
        });
    }

};
