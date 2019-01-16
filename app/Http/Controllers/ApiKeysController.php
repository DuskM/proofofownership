<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiKeysController extends Controller
{
    //
    public function index(){
        return view('users.api_keys.index');
    }
}
