<?php

namespace App\Http\Controllers;

use App\Apikeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Keygen;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class ApiKeysController extends Controller
{
    //
    public function index(){
        $apikeys = Apikeys::paginate(10);
        $user = Auth::user();
        $userId = $user->id;
        return view('users.api_keys.index', compact('apikeys', 'userId'));
    }

    public function create(Request $request){
        $apikey = new \App\Apikeys;
        $apikey->user_id = $request->request->get('user_id');
        $apikey->body = $request->request->get('body');
        $user = Auth::user();
        $userId = $user->id;
        $verification_key = Uuid::generate()->string;
        $uuid = Uuid::generate()->string;
        return view('users.api_keys.create', compact('user', 'userId', 'verification_key', 'uuid', 'apikey'));

    }

    public function store(Request $request){
        if(ApiKeys::where('verification_key', '=', Input::get('verification_key'))->exists()){
            return view('users.api_keys.error');
        } else {
            Apikeys::create($request->all());
        }
        return redirect('/api');
        $userId = Auth::user()->id;

    }
}
