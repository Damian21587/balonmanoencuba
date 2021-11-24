<?php

namespace App\View\Components;

use App\Models\Player;
use Illuminate\View\Component;

class CardPlayers extends Component
{
    public $players;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Player $players)
    {
        $this->players = $players->paginate(6);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-players');
    }
}
