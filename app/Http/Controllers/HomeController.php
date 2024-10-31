<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{

    public function show()
    {
        session()->put('late', '123');
        session()->forget('late');

        $titleWeb = "Cards";
        return view("pages.home", compact("titleWeb"));
    }
}
