<?php

namespace App\Http\Controllers;

use App\Apikeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
        $user = Auth::user();
        $userId = $user->id;
        return view('users.api_keys.create', compact('user', 'userId'));
    }

    public function store(Request $request){
        if(Apikeys::where('lable', '=', Input::get('lable'))->exists()){
            return view('users.api_keys.error');
        } else {
            Apikeys::create($request->all());
        }
        return redirect('/api');
    }

}
