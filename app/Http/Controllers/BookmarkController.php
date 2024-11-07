<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BookmarkController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $bookmarks = $user->bookmarkedCard()->orderBy('card_user_bookmarks.created_at', 'desc')->paginate(9);
        return view('cards.bookmark')->with('bookmarks', $bookmarks);
    }

    public function store(Card $card): RedirectResponse
    {
        $user = Auth::user();

        // Check if the card is already liked
        if ($user->bookmarkedCard()->where('card_id', $card->id)->exists()) {
            return back()->with('error', 'card is already bookmarked');
        }

        $user->bookmarkedCard()->attach($card->id);

        return back()->with('success', 'card bookmarked');
    }

    public function destroy(Card $card): RedirectResponse
    {
        $user = Auth::user();

        // Check if the card is not liked
        if (!$user->bookmarkedCard()->where('card_id', $card->id)->exists()) {
            return back()->with('error', 'card is already bookmarked');
        }

        $user->bookmarkedCard()->detach($card->id);

        return back()->with('success', 'card removed bookmarked');
    }
}
