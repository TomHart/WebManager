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
        Schema::create('NPC_ATTRIBUTES', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('NPC_ID');
            $table->string('ATTRIBUTE_NAME');
            $table->string('VALUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('npc_attributes');
    }
};
