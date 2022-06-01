-----------------------------------------------------------------
-- firenight.lua
--
-----------------------------------------------------------------
-- EpicZone State
--enum eEpicBossZoneState
--{
--	EPICBOSSZONE_STATE_NONE = 0,
--	EPICBOSSZONE_STATE_START,
--	EPICBOSSZONE_STATE_ING,
--	EPICBOSSZONE_STATE_END,
--};

-----------------------------------------------------------------
--
--	
local function SetTime(w, h, m)
print(w .. ":" .. h .. ":" .. m )
return w*60*24 + h*60 + m
end

-----------------------------------------------------------------
--

local BossZoneID = 1

function OnTimer ()
	print("[EpicHeavenHell.Lua OnTimer() Called]")

	local	bEndTime 		= IsEpicBossZoneTimeOver(BossZoneID)

	-- �̰��� ���� �����߿� TimeOver�Ǿ������� �ɸ���.	
	if(bEndTime == 1)
	then
		-- TimeOver�� �Ǹ� EpicZoneState�� EPICBOSSZONE_STATE_END�� ������ش�.
		if(EpicBossZoneState == 0)
		then
			-- print("No Quest")
		else
			SetEpicBossZoneState(BossZoneID, 3)
		end
	end

	local 	EpicBossZoneState	= GetEpicBossZoneState(BossZoneID)
	
	-- �ش� ���¸� ���
	print("EpicBossZoneState = ", EpicBossZoneState)

	if(EpicBossZoneState == 1)
	then
		-- EpicBossZone�� ���۵Ǹ� EpicBossZone�� �����Ѵ�.
		SetEpicBossZoneState(BossZoneID, 2)
		-- EpicBossZone�� ����Ǹ� ����ؼ� SpawnEpicZoneMonster�� ���ش�.
		SpawnEpicZoneMonster(BossZoneID)

	elseif(EpicBossZoneState == 2)
	then 
		-- EpicBossZone�� ����Ǹ� ����ؼ� SpawnEpicZoneMonster�� ���ش�.
		SpawnEpicZoneMonster(BossZoneID)

	elseif(EpicBossZoneState == 3)
	then
		local PosX = 543601
		local PosZ = 773094
		ReturnToEntry(BossZoneID, PosX, PosZ)

		-- EpicBossZone�� ������ �Ǹ� EpicBossZone�� �ʱ�ȭ ���ش�.
		SetEpicBossZoneState(BossZoneID, 0)
	end
end
