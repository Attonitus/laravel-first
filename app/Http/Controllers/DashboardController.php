<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $cards = Card::where('user_id', $user->id)->get();

        return view('dashboard.index', compact('user', 'cards'));
    }
}
