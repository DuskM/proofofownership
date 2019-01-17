<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Keygen;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;


class UserDomainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $domains = Domain::paginate(10);
        $user = Auth::user();
        $userId = $user->id;
        return view('users.domains.index', compact('domains','userId'));
    }

    public function store(Request $request)
    {
        if(Domain::where('name', '=', Input::get('name'))->exists()){
            return view('users.domains.error');
        } else {
            Domain::create($request->all());
        }
        return redirect('/domain');
            $userId = Auth::user()->id;
    }

    public function show(Domain $domain)
    {
            return view('users.domains.show', compact('domain'));
    }

    public function create(Request $request)
    {
        $domain = new \App\Domain;
        $domain->user_id = $request->request->get('user_id');
        $domain->body = $request->request->get('body');
        $user = Auth::user();
        $userId = $user->id;
        $uuid = Uuid::generate()->string;
        return view('users.domains.create', compact('user', 'userId', 'uuid'));
    }

    public function destroy($id)
    {
        $domain = Domain::find($id);
        if(auth()->user()->id !==$domain->user_id){
            return redirect('/domain')->with('error', 'Unauthorized page');
        }
        $domain->delete();
        return redirect('/domain')->with('succes', 'Domain removed');
    }

    public function edit(Domain $domain)
    {
        return view('users.domains.edit', compact('domain'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'verified' => 'required'
        ]);
        if(Domain::where('name', '=', Input::get('name'))->exists()){
            $domain = Domain::find($id);
            return view('users.domains.edit_error', compact('domain'));
        } else {
            $domain = Domain::find($id);
            $domain->name = $request->input('name');
            $domain->verified = $request->input('verified');
            $domain->save();
        }

        return redirect('/domain')->with('success', 'Domain updated, please verify it again.');
    }









}
