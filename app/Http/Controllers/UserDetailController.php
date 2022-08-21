<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\User;
use Redirect;
use Illuminate\Support\Facades\DB;
use Auth;
class UserDetailController extends Controller
{
    public function ShowAllPublicUsers(){

        $all_public_users = DB::table('user_details')
            ->join('users', 'user_details.UD_LINKING_ID', '=', 'users.id')
            ->select( 'user_details.*', 'users.*' )
            ->where('user_details.UD_VISIBLE', '=', true)
            ->where('users.id', '!=', Auth::user()->id)
            ->get();

        return view('adversaries', compact('all_public_users'));
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
}
