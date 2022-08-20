<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
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
        return view('create-game');
    }

    public function store(Request $request){

        
        $GM_TITLE = $request->input('GM_TITLE');
        $GM_AUTHOR_ID = Auth::user()->id;
		$GM_CONTENTS = $request->input('GM_CONTENTS');
		$GM_PUBLIC = $request->input('GM_PUBLIC');
        $GM_DESCRIPTION = $request->input('GM_DESCRIPTION');
        $GM_META = '';		

        Game::create([
            'GM_AUTHOR_ID'   => $GM_AUTHOR_ID,
		    'GM_CONTENTS'    => $GM_CONTENTS,
		    'GM_PUBLIC'      => $GM_PUBLIC,
		    'GM_META'        => $GM_META,
		    'GM_TITLE'       => $GM_TITLE,
		    'GM_DESCRIPTION' => $GM_DESCRIPTION
        ]);
        //return view('games-index');
        return redirect()->action([CreateGameController::class, 'index']);

    }

    public function destroy(){

    }

    public function edit(){

    }
}
