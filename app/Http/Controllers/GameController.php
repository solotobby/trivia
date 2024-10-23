<?php

namespace App\Http\Controllers;

use App\Http\Requests\Game\StoreGameRequest;
use App\Models\Game;
use App\Models\Question;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GameController extends Controller
{
    public function create(){
        return view('user.games.create');
    }

    public function store(StoreGameRequest $request){
        // return $request;
        $game = new Game($request->validated());

        $game->game_paid = $request->has('game_paid');
        $game->question_bank = $request->has('question_bank');
        $game->user_id = Auth::id();
        if($request->question_bank == 1){
            $game->status = 'ACTIVE';
        }
        $game->_id = Str::random(28);
        $game->save();

        if($game->question_bank == 0){
            return redirect('create/questions/'.$game->_id);
        }else{
            return back()->with('success', 'Game created successfully!');
        }
    
    }

    public function myGames(){
        $games = Game::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();

        return view('user.games.index', ['games' => $games]);

    }

    public function createQuestion($id){
        $game = Game::withCount('questions')->where('_id', $id)->first();
       
        return view('user.games.question', ['game' => $game]);
    }

    public function storeQuestion(Request $request){
        
        $request->request->add(['user_id' => auth()->user()->id, 'game_id' => $request->game_id ]);
        
        $question = Question::create($request->all());
        $question->save();

        $get_answer = \DB::table('questions')->select($request->correct_answer)->latest()->first();
        $collect = collect($get_answer);
        $value = $collect->shift();
        $question->update(['correct_answer' => $value]);

        return back()->with('success', 'Question added successfully!');


    }

    public function publishGame($id){
        $game = Game::where('_id', $id)->firstOrFail();

        if($game->status == 'PENDING'){
            $game->status = 'ACTIVE';
            $game->save();
        }
        return back()->with('success', 'Game Published successfully!');
    }
}
