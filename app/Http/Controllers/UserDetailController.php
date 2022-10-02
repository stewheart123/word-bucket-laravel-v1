<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\User;
use App\Models\WordSet;
use Redirect;
use Illuminate\Support\Facades\DB;
use Auth;
class UserDetailController extends Controller
{
    public function ShowAllPublicUsers(){

        //get adversaries of current user!!

        $current_user = DB::table('user_details')
        ->join('users', 'user_details.UD_LINKING_ID', '=', 'users.id')
        ->select( 'user_details.*', 'users.*' )
        ->where('users.id', '=', Auth::user()->id)->first();

        // dd($current_user->UD_ADVERSARIES);
        //needs to loop over each array and compare values, not compare the entire array in one go...
        //might be better to hide on the front end..
        // dd($current_user->UD_ADVERSARIES);
        $decoded_adversaries = json_decode($current_user->UD_ADVERSARIES);
        // dd($decoded_adversaries);

        $all_public_users = DB::table('user_details')
            ->join('users', 'user_details.UD_LINKING_ID', '=', 'users.id')
            ->select( 'user_details.*', 'users.*' )
            ->where('user_details.UD_VISIBLE', '=', true)
            ->where('users.id', '!=', Auth::user()->id)
           // ->where('user_details.UD_ADVERSARIES' , '!=' , $current_user->UD_ADVERSARIES )
            ->get();

        return view('adversaries', compact('all_public_users' , 'decoded_adversaries'));
    }

    public function store(Request $request) {
        $new_adversary_id = $request->input('UD_ID');
        
        $current_user = DB::table('user_details')
        ->join('users', 'user_details.UD_LINKING_ID', '=', 'users.id')
        ->select( 'user_details.*', 'users.*' )
        ->where('users.id', '=', Auth::user()->id)->first();

        $adver_json = json_decode($current_user->UD_ADVERSARIES);
        $result = array_merge((array)$adver_json, (array)$new_adversary_id);
        $result = array_unique($result);

        $recoded_result = json_encode($result);
        $update_details = DB::table('user_details')
        ->join('users', 'user_details.UD_LINKING_ID', '=', 'users.id')
        ->select( 'user_details.*', 'users.*' )
        ->where('users.id', '=', Auth::user()->id)
        ->update(['UD_ADVERSARIES' => $recoded_result ]);

        return redirect()->action([UserDetailController::class, 'ShowAllPublicUsers']);
    }


    public function updateCompletedLexicon(Request $request) {
       // dd($request);
        $complted_lexicon_id = $request->input('WS_ID');

        $current_user = DB::table('user_details')
        ->join('users', 'user_details.UD_LINKING_ID', '=', 'users.id')
        ->select( 'user_details.*', 'users.*' )
        ->where('users.id', '=', Auth::user()->id)->first();

        $word_set_json = json_decode($current_user->UD_META);
        $result = array_merge((array)$word_set_json, (array)$complted_lexicon_id);
        $result = array_unique($result);

        $recoded_result = json_encode($result);
        $update_details = DB::table('user_details')
        ->join('users', 'user_details.UD_LINKING_ID', '=', 'users.id')
        ->select( 'user_details.*', 'users.*' )
        ->where('users.id', '=', Auth::user()->id)
        ->update(['UD_META' => $recoded_result ]);

        return redirect()->action([LexiconController::class, 'lexiconIndex']);
  

    }
}
