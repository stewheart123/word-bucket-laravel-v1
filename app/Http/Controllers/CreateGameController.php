<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Auth;

class CreateGameController extends Controller
{
    //
    public function index(){
        $all_public_games = DB::table('games')->where('GM_PUBLIC','=', 1)->get();
        return view('games-index', compact('all_public_games'));
    }

    public function createGame(){
        $languages = DB::table('languages')->get();
        return view('create-game', compact('languages'));
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

    public function destroy(){

    }

    public function edit(){

    }
}
