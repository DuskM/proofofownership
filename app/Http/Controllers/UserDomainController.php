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
        $domains = Domain::orderBy('created_at', 'desc')->paginate(10);
        return view('users.domains.index')->with('domains', $domains);
    }
    public function store(Request $request)
    {
        Domain::create($request->all());
        return "This Works";
    }

}
