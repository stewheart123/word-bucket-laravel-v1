<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    //
    public function LoadGame($game_data) {
        $game_to_load = DB::table('games')->where('GM_ID', '=', $game_data)->get();
        $main_j = json_decode($game_to_load);
        $game_json =  $main_j[0]->{"GM_CONTENTS"};
        //dd($game_json);
        $second_dec = json_decode($game_json);
        //dd( $second_dec->{"WORDS"});
        $second_dec = $second_dec->{"WORDS"};

        $returned_game_data = $game_json ;
        return view('game', compact('returned_game_data'));
    }
}
