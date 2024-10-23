<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GamePlayController extends Controller
{
    public function instruction($id){
        $game = Game::where('_id', $id)->first();
        return view('user.play.instruction', ['game' => $game]);
    }
}
