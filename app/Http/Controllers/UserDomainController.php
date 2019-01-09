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

}
