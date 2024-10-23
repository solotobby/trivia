<?php

// app/Http/Requests/StoreGameRequest.php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
{
    
    
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'number_of_question' => 'required|integer|min:1',
            'time_allowed' => 'required|string|max:10',
            'number_of_players' => 'nullable|integer|min:1',
            'description' => 'required|string',
            'game_paid' => 'nullable|boolean', // Checkbox, will be true if checked, otherwise null
            'coin_per_play' => ['required_if:game_paid,true', 'nullable', 'integer', 'min:1'], // Only required if game_paid is checked
            'question_bank' => 'nullable|boolean', 
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The game name is required.',
            'number_of_question.required' => 'Please provide the number of questions.',
            'time_allowed.required' => 'Time allowed for the game is required.',
            'description.required' => 'Please provide a description for the game.',
            'coin_per_play.required_if' => 'Coin Amount per play is required if the game is paid.',
            'coin_per_play.integer' => 'Coin Amount per play must be a valid number.',
            'coin_per_play.min' => 'Coin Amount per play must be at least 1 if provided.',
        ];
    }
}
