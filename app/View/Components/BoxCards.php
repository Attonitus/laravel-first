<?php

namespace App\View\Components;

use App\Models\Card;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BoxCards extends Component
{
    public string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $cards = Card::latest()->limit(3)->get();
        return view('components.box-cards')->with('cards', $cards);
    }
}
