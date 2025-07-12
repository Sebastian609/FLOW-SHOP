<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->foreignId('category_group_id')
                  ->nullable()
                  ->constrained('category_groups'); // nombre de la tabla referenciada
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['category_group_id']);
            $table->dropColumn('category_group_id');
        });
    }
};
