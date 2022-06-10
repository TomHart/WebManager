<?php

namespace App\Http\Controllers\Admin\NPC;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddNPCTradeRequest;
use App\Models\NPC;
use App\Models\NPCTrade;
use Illuminate\View\View;

class TradesController extends Controller
{
    public function showAddTradeForm(NPC $npc): View
    {
        return view('admin.npc.trades.form', [
            'npc' => $npc
        ]);
    }

    public function store(NPC $npc, AddNPCTradeRequest $request)
    {
        $trade = (new NPCTrade())->fill($request->validated());
        $trade->NPC_ID = $npc->trade_template_id;
        $trade->save();

        return redirect()->back();
    }
}
