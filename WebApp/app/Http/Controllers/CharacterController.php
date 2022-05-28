<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    public function index(){
        return view('character.index', ['characters' => Character::all()]);
    }
}
