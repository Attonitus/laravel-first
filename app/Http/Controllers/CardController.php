<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Error;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;


class CardController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $cards = Card::latest()->paginate(5);
        return view("cards.index")->with('cards', $cards);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("cards.create_card");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validatedData = $request->validate([
            "name" => 'required | string | max:255',
            "description" => 'required | string',
            "value" => 'required | integer',
            "illustrator" => 'required | string',
            "rarity" => 'required | string',
            "card_type" => 'required | string',
            "condition" => 'required | string',
            "bidding" => 'required | string',
            "country" => 'required | string',
            'card_img' => 'required| image | mimes:jpeg,jpg,png,gif | max:2048'
        ]);
        $user_data = Auth::user();

        $validatedData['user_id'] = $user_data->id;

        if ($request->hasFile('card_img')) {
            $path = $request->file('card_img')->store('cards', 'public');
            $validatedData["card_img"] = $path;
        }


        Card::create([
            'name' => $validatedData["name"],
            'description' => $validatedData["description"],
            'value' => $validatedData["value"],
            'illustrator' => $validatedData["illustrator"],
            'rarity' => $validatedData["rarity"],
            'card_type' => $validatedData["card_type"],
            'condition' => $validatedData["condition"],
            'country' => $validatedData["country"],
            'bidding' => $validatedData["bidding"] === "Yes" ?  true : false,
            'card_img' => $validatedData["card_img"],
            'user_id' => $validatedData["user_id"]
        ]);

        return redirect()->route('cards.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card): View
    {
        return view('cards.show')->with("card", $card);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card): View
    {
        $this->authorize('update', $card);
        return view('cards.edit')->with('card', $card);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card): RedirectResponse
    {
        $this->authorize('update', $card);

        $validatedData = $request->validate([
            "name" => 'required | string | max:255',
            "description" => 'required | string',
            "value" => 'required | integer',
            "illustrator" => 'required | string',
            "rarity" => 'required | string',
            "card_type" => 'required | string',
            "condition" => 'required | string',
            "bidding" => 'required | string',
            "country" => 'required | string',
            'card_img' => 'nullable| image | mimes:jpeg,jpg,png,gif | max:2048'
        ]);

        $user_data = Auth::user();

        $validatedData['user_id'] = $user_data->id;


        if ($request->hasFile('card_img')) {

            $oldImagePath = $card->card_img;

            if (Storage::disk('public')->exists($oldImagePath)) {
                Log::info('La imagen existe en el disco "public" y se procederá a eliminarla: ' . $oldImagePath);
                Storage::disk('public')->delete($oldImagePath);
                Log::info('La imagen ha sido eliminada correctamente: ' . $oldImagePath);
            } else {
                Log::warning("No se encontró la imagen antigua en el disco 'public': " . $oldImagePath);
            }

            $path = $request->file('card_img')->store('cards', 'public');
            $validatedData["card_img"] = $path;
        }


        $card->update([
            'name' => $validatedData["name"],
            'description' => $validatedData["description"],
            'value' => $validatedData["value"],
            'illustrator' => $validatedData["illustrator"],
            'rarity' => $validatedData["rarity"],
            'card_type' => $validatedData["card_type"],
            'condition' => $validatedData["condition"],
            'country' => $validatedData["country"],
            'bidding' => $validatedData["bidding"] === "Yes" ?  true : false,
            'card_img' => isset($validatedData["card_img"]) ? $validatedData["card_img"] : $card->card_img,
            'user_id' => $validatedData["user_id"]
        ]);

        return redirect()->route('cards.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card): RedirectResponse
    {
        $this->authorize('delete', $card);

        if ($card->card_img) {
            Storage::disk('public')->delete($card->card_img);
        }

        $card->delete();

        if (request()->query('from') == 'dashboard') {
            return redirect()->route('dashboard');
        }

        return redirect()->route('cards.index');
    }

    public function search(Request $request): View
    {
        $keywords = strtolower($request->input('keywords'));

        $query = Card::query();

        if ($keywords) {
            $query->where(function ($q) use ($keywords) {
                $q->whereRaw('LOWER(name) like ?', ['%' . $keywords . '%'])
                    ->orWhereRaw('LOWER(type) like ?', ['%' . $keywords . '%']);
            });
        }

        $cards = $query->paginate(10);
        return view('cards.index')->with('cards', $cards);
    }
}
