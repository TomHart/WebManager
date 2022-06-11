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
        Schema::create('CHARACTERS', function (Blueprint $table) {
            $table->id('TID');
            $table->string('NAME')->nullable();
            $table->unsignedBigInteger('TYPE')->nullable();
            $table->unsignedBigInteger('RACE')->nullable();
            $table->unsignedBigInteger('GENDER')->nullable();
            $table->unsignedBigInteger('CLASS')->nullable();
            $table->unsignedBigInteger('LVL')->nullable();
            $table->unsignedBigInteger('STR')->nullable();
            $table->unsignedBigInteger('DEX')->nullable();
            $table->unsignedBigInteger('INT')->nullable();
            $table->unsignedBigInteger('CON')->nullable();
            $table->unsignedBigInteger('CHA')->nullable();
            $table->unsignedBigInteger('WIS')->nullable();
            $table->unsignedBigInteger('AC')->nullable();
            $table->unsignedBigInteger('MAX_HP')->nullable();
            $table->unsignedBigInteger('MAX_SP')->nullable();
            $table->unsignedBigInteger('MAX_MP')->nullable();
            $table->unsignedBigInteger('CUR_HP')->nullable();
            $table->unsignedBigInteger('CUR_SP')->nullable();
            $table->unsignedBigInteger('CUR_MP')->nullable();
            $table->unsignedBigInteger('MOVEMENT_WALK')->nullable();
            $table->unsignedBigInteger('MOVEMENT_RUN')->nullable();
            $table->unsignedBigInteger('AR')->nullable();
            $table->unsignedBigInteger('DR')->nullable();
            $table->unsignedBigInteger('MAR')->nullable();
            $table->unsignedBigInteger('MDR')->nullable();
            $table->unsignedBigInteger('MIN_DAMAGE')->nullable();
            $table->unsignedBigInteger('MAX_DAMAGE')->nullable();
            $table->unsignedBigInteger('ATK_SPEED')->nullable();
            $table->unsignedBigInteger('RANGE')->nullable();
            $table->unsignedBigInteger('FIRE_RES')->nullable();
            $table->unsignedBigInteger('WATER_RES')->nullable();
            $table->unsignedBigInteger('AIR_RES')->nullable();
            $table->unsignedBigInteger('EARTH_RES')->nullable();
            $table->unsignedBigInteger('MAGIC_RES')->nullable();
            $table->unsignedBigInteger('POISON_RES')->nullable();
            $table->unsignedBigInteger('ICE_RES')->nullable();
            $table->unsignedBigInteger('THUNDER_RES')->nullable();
            $table->unsignedBigInteger('MAGIC_HISTORY')->nullable();
            $table->unsignedBigInteger('MURDER_POINT')->nullable();
            $table->unsignedBigInteger('EXP')->nullable();
            $table->unsignedBigInteger('FIRE_MIN_DAMAGE')->nullable();
            $table->unsignedBigInteger('FIRE_MAX_DAMAGE')->nullable();
            $table->unsignedBigInteger('WATER_MIN_DAMAGE')->nullable();
            $table->unsignedBigInteger('WATER_MAX_DAMAGE')->nullable();
            $table->unsignedBigInteger('EARTH_MIN_DAMAGE')->nullable();
            $table->unsignedBigInteger('EARTH_MAX_DAMAGE')->nullable();
            $table->unsignedBigInteger('AIR_MIN_DAMAGE')->nullable();
            $table->unsignedBigInteger('AIR_MAX_DAMAGE')->nullable();
            $table->unsignedBigInteger('MAGIC_MIN_DAMAGE')->nullable();
            $table->unsignedBigInteger('MAGIC_MAX_DAMAGE')->nullable();
            $table->unsignedBigInteger('POISON_MIN_DAMAGE')->nullable();
            $table->unsignedBigInteger('POISON_MAX_DAMAGE')->nullable();
            $table->unsignedBigInteger('ICE_MIN_DAMAGE')->nullable();
            $table->unsignedBigInteger('ICE_MAX_DAMAGE')->nullable();
            $table->unsignedBigInteger('THUNDER_MIN_DAMAGE')->nullable();
            $table->unsignedBigInteger('THUNDER_MAX_DAMAGE')->nullable();
            $table->unsignedBigInteger('PHYSICAL_RESISTANCE')->nullable();
            $table->unsignedBigInteger('SKILL_BLOCK')->nullable();
            $table->unsignedBigInteger('SIGHT')->nullable();
            $table->unsignedBigInteger('BADGE1_RANK_POINT')->nullable();
            $table->unsignedBigInteger('BADGE2_RANK_POINT')->nullable();
            $table->unsignedBigInteger('BADGE3_RANK_POINT')->nullable();
            $table->unsignedBigInteger('RANK')->nullable();
            $table->unsignedBigInteger('ITEM_POINT')->nullable();
            $table->unsignedBigInteger('GUILD')->nullable();
            $table->unsignedBigInteger('GUILD_RANK')->nullable();
            $table->unsignedBigInteger('GUILD_SCORE')->nullable();
            $table->unsignedBigInteger('LOST_EXP')->nullable();
            $table->unsignedBigInteger('WEAPON')->nullable();
            $table->string('ITEM1')->nullable();
            $table->string('ITEM2')->nullable();
            $table->string('ITEM3')->nullable();
            $table->string('ITEM4')->nullable();
            $table->unsignedBigInteger('ARMOR_HEAD')->nullable();
            $table->unsignedBigInteger('ARMOR_BODY')->nullable();
            $table->unsignedBigInteger('ARMOR_ARM')->nullable();
            $table->unsignedBigInteger('ARMOR_HAND')->nullable();
            $table->unsignedBigInteger('ARMOR_LEG')->nullable();
            $table->unsignedBigInteger('ARMOR_FOOT')->nullable();
            $table->unsignedBigInteger('ARMOR_MANTLE')->nullable();
            $table->unsignedBigInteger('MONEY')->nullable();
            $table->unsignedBigInteger('GELD_MIN')->nullable();
            $table->unsignedBigInteger('GELD_MAX')->nullable();
            $table->unsignedBigInteger('DROP_TID')->nullable();
            $table->unsignedBigInteger('SLOW_PERCENT')->nullable();
            $table->unsignedBigInteger('SLOW_TIME')->nullable();
            $table->unsignedBigInteger('FAST_PERCENT')->nullable();
            $table->unsignedBigInteger('FAST_TIME')->nullable();
            $table->unsignedBigInteger('PRODUCT_SKIN_ITEMNAME')->nullable();
            $table->unsignedBigInteger('PRODUCT_MEAT')->nullable();
            $table->unsignedBigInteger('PRODUCT_MEAT_ITEMNAME')->nullable();
            $table->unsignedBigInteger('PRODUCT_GARBAGE')->nullable();
            $table->unsignedBigInteger('PRODUCT_GARBAGE_ITMENAME')->nullable();
            $table->unsignedBigInteger('ATTRIBUTE_TYPE')->nullable();
            $table->string('NAME_COLOR')->nullable();
            $table->unsignedBigInteger('DROPRANK')->nullable();
            $table->unsignedFloat('DROPMEDITATION')->nullable();
            $table->unsignedBigInteger('SPIRIT_TYPE')->nullable();
            $table->unsignedBigInteger('LANDATTACHTYPE')->nullable();
            $table->unsignedBigInteger('TAMABLE')->nullable();
            $table->unsignedBigInteger('RUN_CORRECT')->nullable();
            $table->unsignedBigInteger('ATTACK_CORRECT')->nullable();
            $table->unsignedBigInteger('SIEGEWARCHARTYPE')->nullable();
            $table->unsignedBigInteger('RANGETYPE')->nullable();
            $table->unsignedBigInteger('STAMINAPOINT')->nullable();
            $table->unsignedBigInteger('PETTYPE')->nullable();
            $table->unsignedBigInteger('STARTSTAMINA')->nullable();
            $table->unsignedBigInteger('HEROIC_MIN_DAMAGE')->nullable();
            $table->unsignedBigInteger('HEROIC_MAX_DAMAGE')->nullable();
            $table->unsignedBigInteger('HEROIC_DEFENSE_POINT')->nullable();
            $table->timestamps();
        });


        //96 	휴먼전사남성	196609 	1 	1 	1 	1 	17 	12 	6 	15 	0 	6 	0 	120 	65 	32 				2000 	6000 	0 	0 	0 	0 	0 	0 	60 	100 	0 	0 	0 	0 	0 																																			11 	190;5	193;3	3857;5		0 	0 	0 	0 	0 	0 	0 	0 				9 	5 	9 	3 											0 		1 	1

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
};
