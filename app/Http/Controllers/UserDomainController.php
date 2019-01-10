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

        Domain::create($request->all());
        return redirect('/domain');
    }

    public function show($id){

            //
            $domain = Domain::find($id);
            return view('users.domains.show', compact('domain'));

    }

    public function create(Request $request){
        $domain = new \App\Domain;
        $domain->user_id = $request->request->get('user_id');
        $domain->body = $request->request->get('body');
        $user = Auth::user();
        $userId = $user->id;
        $key = Keygen::numeric(10)->generate();
        return view('users.domains.create', compact('user', 'userId', 'key'));
    }
}
