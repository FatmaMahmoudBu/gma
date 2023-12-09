<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationSendController extends Controller
{
    public function updateDeviceToken(Request $request)
    {
        /*return response()->json(['Token successfully stored.']);
        Auth::user()->device_token =  $request->token;

        Auth::user()->save();


*/
        $user = User::find(Auth::user()->id);
        //return response()->json($user);
        $user->device_token =  $request->token;
        $user->save();

        return response()->json(['Token successfully stored.']);
    }
}
