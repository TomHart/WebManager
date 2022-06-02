<?php

namespace App\Http\Controllers;

use App\Models\NPC;
use Illuminate\Http\Request;

class NPCController extends Controller
{
    public function index()
    {
        return view('npc.index', ['entries' => NPC::with('trades')->get()->sortBy('TYPE')]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(NPC $npc)
    {
        $npc->load(['trades', 'trades.item']);
        return view('npc.show', ['npc' => $npc]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
