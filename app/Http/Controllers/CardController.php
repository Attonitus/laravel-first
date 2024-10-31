<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Error;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $value = session()->get('late');
        dd($value);
        $cards = Card::all();
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

        $validatedData['user_id'] = 70;

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
        return view('cards.edit')->with('card', $card);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card): RedirectResponse
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
            'card_img' => 'nullable| image | mimes:jpeg,jpg,png,gif | max:2048'
        ]);

        $validatedData['user_id'] = 70;


        if ($request->hasFile('card_img')) {

            $oldImagePath = $card->card_img;

            if (Storage::disk('public')->exists($oldImagePath)) {
                Log::info('La imagen existe en el disco "public" y se procederá a eliminarla: ' . $oldImagePath);
                Storage::disk('public')->delete($oldImagePath); // Elimina la imagen en el disco 'public'
                Log::info('La imagen ha sido eliminada correctamente: ' . $oldImagePath);
            } else {
                Log::warning("No se encontró la imagen antigua en el disco 'public': " . $oldImagePath);
            }

            // Guarda la nueva imagen
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
        if ($card->card_img) {
            Storage::disk('public')->delete($card->card_img);
        }

        $card->delete();
        return redirect()->route('cards.index');
    }
}
