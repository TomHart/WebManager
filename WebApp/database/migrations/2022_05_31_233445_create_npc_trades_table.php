<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NPC_TRADES', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('NPC_ID');
            $table->unsignedBigInteger('ITEM_ID');
            $table->unsignedBigInteger('COUNT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('NPC_TRADES');
    }
};
