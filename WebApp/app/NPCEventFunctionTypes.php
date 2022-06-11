<?php

namespace App;

enum NPCEventFunctionTypes: int
{
    case NONE = 0;
    case SPAWN = 1;
    case FACTOR = 2;
    case VEHICLE = 3;
    case SCHEDULE = 4;
    case HIDDEN = 5;
    case SHOP = 6;
    case INFORMATION = 7;
    case TELEPORT = 8;
    case NPCTRADE = 9;
    case CONVERSATION = 10;
    case NATURE = 11;
    case STATUS = 12;
    case ACTION = 13;
    case SKILL = 14;
    case SHRINE = 15;
    case UVU_REWARD = 16;
    case ITEM_REPAIR = 17;
    case MASTERY_SPECIALIZE = 18;
    case BINDING = 19;
    case BANK = 20;
    case NPCDAILOG = 21;
    case ITEMCONVERT = 22;
    case GUILD = 23;
    case PRODUCT = 24;
    case SKILLMASTER = 25;
    case REFINERY = 26;
    case QUEST = 27;
    case AUCTION = 28;
    case CHAR_CUSTOMIZE = 29;
    case POINTLIGHT = 30;
    case REMISSION = 31;
    case WANTEDCRIMINAL = 32;
    case SIEGEWAR_NPC = 33;
    case TAX = 34;
    case GUILD_WAREHOUSE = 35;
    case ARCHLORD = 36;
    case GAMBLE = 37;
    case GACHA = 38;
    case WORLD_CHAMPIONSHIP = 39;
}
