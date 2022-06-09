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
    public function up()
    {
        Schema::create('NPC_EVENTS', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('NPC_ID');
            $table->unsignedBigInteger('FUNCTION_ID')->nullable();
            $table->unsignedBigInteger('EVENT_ID')->nullable();
            $table->unsignedBigInteger('COND_START')->nullable();
            $table->unsignedBigInteger('COND_TYPE')->nullable();
            $table->unsignedBigInteger('COND_TARGET_ITEM_ID')->nullable();
            $table->unsignedBigInteger('COND_AREA_TYPE')->nullable();
            $table->unsignedBigInteger('COND_AREA_SPHERE_RADIUS')->nullable();
            $table->unsignedBigInteger('COND_AREA_FAN_RADIUS')->nullable();
            $table->unsignedBigInteger('COND_AREA_ANGLE')->nullable();
            $table->unsignedBigInteger('COND_AREA_BOX_INF')->nullable();
            $table->unsignedBigInteger('COND_AREA_BOX_SUP')->nullable();
            $table->unsignedBigInteger('COND_END')->nullable();
            $table->unsignedBigInteger('DIALOG_START')->nullable();
            $table->unsignedBigInteger('NPC_TRADE_START')->nullable();
            $table->unsignedBigInteger('TEMPLATE')->nullable();
            $table->unsignedBigInteger('NPC_TRADE_END')->nullable();
            $table->unsignedBigInteger('DIALOG_END')->nullable();
            $table->unsignedBigInteger('QUEST_GROUP_ID')->nullable();
            $table->unsignedBigInteger('QUEST_END')->nullable();
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
        Schema::dropIfExists('NPC_EVENTS');
    }
};
