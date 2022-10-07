<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\UserDetail;
use App\Models\User;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Auth;

class CreateGameController extends Controller
{
    //
    public function index(){
        $personal_games = DB::table('games')->where('GM_AUTHOR_ID','=', Auth::user()->id )->get();
        // if($personal_games == null) {
        //     $personal_games = [];
        // }
        //dd($personal_games);

        $wordbucket_official_games = DB::table('games')->where('GM_AUTHOR_ID',11)->get();

        $all_public_games = DB::table('games')
        ->where('GM_PUBLIC','=', 1)
        //->where('GM_AUTHOR_ID','!=', 11)
        ->where('GM_AUTHOR_ID','!=', Auth::user()->id)->get();
        // dd($all_public_games);

        $current_user_details = DB::table('user_details')
        ->join('users', 'user_details.UD_LINKING_ID', '=', 'users.id')
        ->select( 'user_details.*', 'users.*' )
        ->where('users.id', '=', Auth::user()->id)->first();

        $adver_json = json_decode($current_user_details->UD_ADVERSARIES);
        $user_adversaries = DB::table('user_details')
            ->join('users', 'user_details.UD_LINKING_ID', '=', 'users.id')
            ->select( 'user_details.*', 'users.*' )
            ->where('user_details.UD_VISIBLE', '=', true)
            //where is in array
            ->whereIn('users.id' , $adver_json )
            ->where('users.id', '!=', Auth::user()->id)
            ->where('users.id', '!=', 11)
            ->get();

       //dd($user_adversaries);

        $languages = DB::table('languages')->get();
        return view('games-index', compact('personal_games', 'wordbucket_official_games' ,'all_public_games', 'user_adversaries', 'languages'));
    }

    public function createGame() {
        $languages = DB::table('languages')->get();
        return view('create-game', compact('languages'));
    }

    public function loggedOutGames() {    
        $wordbucket_official_games = DB::table('games')->where('GM_AUTHOR_ID',11)->get();
        
        $languages = DB::table('languages')->get();
        return view('games-index-demo', compact('wordbucket_official_games' ,'languages'));
    }

    public function store(Request $request){

        $GM_TITLE = $request->input('GM_TITLE');
        $GM_AUTHOR_ID = Auth::user()->id;
		$GM_CONTENTS = $request->input('GM_CONTENTS');
		$GM_PUBLIC = $request->input('GM_PUBLIC');
        $GM_DESCRIPTION = $request->input('GM_DESCRIPTION');
        $GM_META = '';		
        $GM_NATIVE_SHORTHAND = $request->input('GM_NATIVE_SHORTHAND');
        $GM_FOREIGN_SHORTHAND = $request->input('GM_FOREIGN_SHORTHAND');
        
        
        $native_ID = DB::table('languages')->where('LA_SHORTHAND',$GM_NATIVE_SHORTHAND)->first();
        $foreign_ID = DB::table('languages')->where('LA_SHORTHAND',$GM_FOREIGN_SHORTHAND)->first();
        // dd($native_ID->LA_ID);

        Game::create([
            'GM_AUTHOR_ID'   => $GM_AUTHOR_ID,
		    'GM_CONTENTS'    => $GM_CONTENTS,
		    'GM_PUBLIC'      => $GM_PUBLIC,
		    'GM_META'        => $GM_META,
		    'GM_TITLE'       => $GM_TITLE,
		    'GM_DESCRIPTION' => $GM_DESCRIPTION,
            'GM_NATIVE_ID' => $native_ID->LA_ID,
            'GM_FOREIGN_ID'  => $foreign_ID->LA_ID
        ]);
        //return view('games-index');
        return redirect()->action([CreateGameController::class, 'index']);

    }

    public function destroy(Request $request){
        $game_to_delete = Game::where('GM_ID', $request->GM_ID)->where('GM_AUTHOR_ID', Auth::user()->id);
        $game_to_delete->delete();
        return redirect('/games-index');
    }

    public function edit(){

    }
}
