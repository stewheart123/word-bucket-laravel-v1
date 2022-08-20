<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserDetailController extends Controller
{
    public function ShowAllPublicUsers(){

        //  DB::table('user_details')
        // ->select('UD_VISIBLE', true)->get();
        
        $all_public_users = DB::table('user_details')
            ->join('users', 'user_details.UD_LINKING_ID', '=', 'users.id')
            ->select( 'user_details.*', 'users.*' )
            ->where('user_details.UD_VISIBLE', '=', true)
            ->get();
        
        // dd($all_public_users);
        return view('adversaries', compact('all_public_users'));
    }
}
