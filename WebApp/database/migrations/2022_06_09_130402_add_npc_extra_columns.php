<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('NPCS', function (Blueprint $table) {
            $table->unsignedBigInteger('TID')->nullable();
            $table->string('DEGREES')->nullable();
            $table->dropColumn('TEMPLATE_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('NPCS', function (Blueprint $table) {
            $table->dropColumn('TID');
            $table->dropColumn('DEGREES');
            $table->unsignedBigInteger('TEMPLATE_ID')->nullable();
        });
    }
};
