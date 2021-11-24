<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PlayerController extends Controller
{
    public function detallesJugador($id)
    {
        $player = Player::findOrFail($id);
        $player_positions = array();
        foreach ($player->positions as $item)
            $player_positions[] = $item->getTranslation('name', App::getLocale());

        $resultado_positions = implode(', ', $player_positions);

        return view('home.detalles-jugador', compact('player', 'resultado_positions'));
    }
}
