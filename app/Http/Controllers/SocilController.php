<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocilController extends Controller
{
    public function redirect($serv){
        return Socialite::driver($serv)->redirect();

    }

    public function callbacks($serv){
     return $user = Socialite::driver($serv)->user();

    }
}
