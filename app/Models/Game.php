<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',                // Add 'name' to the fillable array
        'number_of_question',
        'time_allowed',
        'number_of_players',
        'number_of_game_played',
        'game_paid',
        'coin_per_play',
        'description',
        'question_bank',
        'status',
        '_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function questions(){
        return $this->hasMany(Question::class, 'game_id');
    }

    public function questionCount(){
        $this->questions()->count() == null ? 0 : $this->questions()->count(); 
    }
}
