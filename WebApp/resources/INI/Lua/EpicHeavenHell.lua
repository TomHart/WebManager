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

	-- 이것은 실제 진행중에 TimeOver되었을때만 걸린다.	
	if(bEndTime == 1)
	then
		-- TimeOver가 되면 EpicZoneState를 EPICBOSSZONE_STATE_END로 만들어준다.
		if(EpicBossZoneState == 0)
		then
			-- print("No Quest")
		else
			SetEpicBossZoneState(BossZoneID, 3)
		end
	end

	local 	EpicBossZoneState	= GetEpicBossZoneState(BossZoneID)
	
	-- 해당 상태를 출력
	print("EpicBossZoneState = ", EpicBossZoneState)

	if(EpicBossZoneState == 1)
	then
		-- EpicBossZone이 시작되면 EpicBossZone을 진행한다.
		SetEpicBossZoneState(BossZoneID, 2)
		-- EpicBossZone이 진행되면 계속해서 SpawnEpicZoneMonster를 해준다.
		SpawnEpicZoneMonster(BossZoneID)

	elseif(EpicBossZoneState == 2)
	then 
		-- EpicBossZone이 진행되면 계속해서 SpawnEpicZoneMonster를 해준다.
		SpawnEpicZoneMonster(BossZoneID)

	elseif(EpicBossZoneState == 3)
	then
		local PosX = 543601
		local PosZ = 773094
		ReturnToEntry(BossZoneID, PosX, PosZ)

		-- EpicBossZone이 끝나게 되면 EpicBossZone을 초기화 해준다.
		SetEpicBossZoneState(BossZoneID, 0)
	end
end
