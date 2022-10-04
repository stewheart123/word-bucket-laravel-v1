<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserDetail;
use Auth;
use App\Models\WordSet;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class LexiconController extends Controller
{
    public function lexiconIndex() {

        if(Auth::check()) { 
            $current_user = DB::table('user_details')
            ->join('users', 'user_details.UD_LINKING_ID', '=', 'users.id')
            ->select( 'user_details.*', 'users.*' )
            ->where('users.id', '=', Auth::user()->id)->first();
    
            $user_completed_lesson = $current_user->UD_META;
            $user_completed_lesson = json_decode($user_completed_lesson);

        } else {
            $user_completed_lesson = '';
        }

            $all_lexicon_beginner = DB::table('word_sets')
            ->where('WS_LEVEL', 'beginner')
            ->select('WS_ID','WS_TITLE','WS_DESCRIPTION')
            ->get();

    
        return view('lexicon', compact('all_lexicon_beginner', 'user_completed_lesson'));
    
    }

    public function LoadLexiconGame($game_data) {
        $game_to_load = DB::table('word_sets')->where('WS_ID', '=', $game_data)->get();
        $main_j = json_decode($game_to_load);
        $game_json =  $main_j[0]->{"WS_CONTENT"};
        //dd($game_json);
        $second_dec = json_decode($game_json);
        //dd( $second_dec->{"WORDS"});
        //second dec isnt being used..
        $second_dec = $second_dec->{"WORDS"};

        $returned_game_data = $game_json ;
        $word_set_ID = $game_data;
        return view('lexicon-game', compact('returned_game_data', 'word_set_ID'));
    }
}
