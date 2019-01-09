<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\User;

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
        return "This Works";
    }

    public function show($id){

            //
            $domain = Domain::find($id);
            return view('users.domains.show')->with('domain', $domain);

    }

    public function create(){
        return view('users.domains.create');
    }

}
