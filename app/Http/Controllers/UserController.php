<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function init()
    {
        $users = ["Manueh", "Batman", "Somebody"];

        return view("users.users", compact("users"));
    }

    public function iniTwo()
    {
        $users = ["Manueh2", "Batman2", "Somebody2s"];

        return view("users.users", compact("users"));
    }
}
