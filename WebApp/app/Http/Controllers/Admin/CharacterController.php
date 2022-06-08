<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Character;

class CharacterController extends Controller
{
    public function index(){
        return view('admin.character.index', ['characters' => Character::all()]);
    }

    public function show($id){
        $character = Character::with(['items', 'items.attributes'])->findOrFail($id);

        $inventory = [
            [
                [null, null, null, null],
                [null, null, null, null],
                [null, null, null, null],
                [null, null, null, null]
            ],
            [
                [null, null, null, null],
                [null, null, null, null],
                [null, null, null, null],
                [null, null, null, null]
            ],
            [
                [null, null, null, null],
                [null, null, null, null],
                [null, null, null, null],
                [null, null, null, null]
            ],
            [
                [null, null, null, null],
                [null, null, null, null],
                [null, null, null, null],
                [null, null, null, null]
            ],
        ];

        foreach($character->items()->where('STATUS', 2)->get() as $item){
            $pos = explode(',', $item->pivot->POS);
            $inventory[(int)$pos[0]][(int)$pos[1]][(int)$pos[2]] = $item;
        }

        return view('admin.character.show', ['character' => $character, 'items' => $inventory]);
    }
}
