<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;
use Keygen;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserDomainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $domains = Domain::paginate(10);
        return view('users.domains.index', compact('domains','categories'));
    }

    public function store(Request $request)
    {
        $domains = Domain::paginate(10);
        $userId = Auth::user()->id;
        Domain::create($request->all());
        return view('users.domains.index', compact('domains'));
    }

    public function show($id){

            //
            $domain = Domain::find($id);
            $key = Keygen::numeric(10)->generate();
            return view('users.domains.show', compact('domain', 'key'));

    }

    public function create(Request $request){
        $domain = new \App\Domain;
        $domain->user_id = $request->request->get('user_id');
        $domain->body = $request->request->get('body');
        $user = Auth::user();
        $userId = $user->id;
        return view('users.domains.create', compact('user', 'userId'));
    }

}
