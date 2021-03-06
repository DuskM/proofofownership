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

class ApikeyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $apikeys = Apikeys::paginate(10);
        $user = Auth::user();
        $userId = $user->id;
        return view('users.api_keys.index', compact('apikeys','userId'));
    }


    public function show(Apikeys $api)
    {
        return view('users.api_keys.show', compact('api'));
    }



    public function create(Request $request){
        $apikey = new \App\Apikeys;
        $apikey->user_id = $request->request->get('user_id');
        $user = Auth::user();
        $userId = $user->id;
        return view('users.api_keys.create', compact('user', 'userId', 'apikey'));
    }

    public function store(Request $request){
        if(ApiKeys::where('uuid', '=', Input::get('uuid'))->exists()){
            return view('users.api_keys.error');
        } else {
            Apikeys::create($request->all());
        }
        return redirect('/api');
        $userId = Auth::user()->id;
    }



    public function edit(Apikeys $api)
    {
        return view('users.api_keys.edit', compact('api'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'label' => 'required',
        ]);
        if(Apikeys::where('label', '=', Input::get('label'))->exists()){
            $apikey = Apikeys::find($id);
            return view('users.api_keys.edit_error', compact('apikey'));
        } else {
            $apikey = Apikeys::find($id);
            $apikey->label = $request->input('label');
            $apikey->save();
        }

        return redirect('/api')->with('success', 'Label is updated');
    }

    public function destroy(Apikeys $api)
    {

        if(auth()->user()->id !==$api->user_id){
            return redirect('/api')->with('error', 'Unauthorized page');
        }
        $api->delete();
        return redirect('/api')->with('success', 'API Key removed');
    }

}
