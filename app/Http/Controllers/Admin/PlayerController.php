<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Images;
use App\Models\Player;
use App\Models\PlayerTitle;
use App\Models\Position;
use App\Models\Province;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Response;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->view_index = 'admin.jugadores.index';
        $this->view_create = 'admin.jugadores.create';
        $this->view_edit = 'admin.jugadores.edit';
        $this->view_show = 'admin.jugadores.show';

        $this->route_index = 'admin.content.jugadores.index';
        $this->route_create = 'admin.content.jugadores.create';
        $this->route_edit = 'admin.content.jugadores.edit';
        $this->route_show = 'admin.content.jugadores.show';

        $this->middleware('hasPermission:jugadores.create')->only(['create', 'store', 'validateDatosTitulos']);
        $this->middleware('hasPermission:jugadores.destroy')->only(['destroy']);
        $this->middleware('hasPermission:jugadores.index')->only(['index']);
        $this->middleware('hasPermission:jugadores.edit')->only(['update', 'edit']);
    }

    /**
     * Display a listing of the Player.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Player $players */
        $count = count(Player::all());
        $players = Player::latest()->paginate($count);

        return view($this->view_index, compact('players'));
    }

    /**
     * Show the form for creating a new Player.
     *
     * @return Response
     */
    public function create()
    {
        $years_experiences = [
            ['id' => '1', 'value' => '1'],
            ['id' => '2', 'value' => '2'],
            ['id' => '3', 'value' => '3'],
            ['id' => '4', 'value' => '4'],
            ['id' => '5', 'value' => '5'],
            ['id' => '6', 'value' => '6'],
            ['id' => '7', 'value' => '7'],
            ['id' => '8', 'value' => '8'],
            ['id' => '9', 'value' => '9'],
            ['id' => '10', 'value' => '10'],
            ['id' => '11', 'value' => '11'],
            ['id' => '12', 'value' => '12'],
            ['id' => '13', 'value' => '13'],
            ['id' => '14', 'value' => '14'],
            ['id' => '15', 'value' => '15'],
            ['id' => '16', 'value' => '16'],
            ['id' => '17', 'value' => '17'],
            ['id' => '18', 'value' => '18'],
            ['id' => '19', 'value' => '19'],
            ['id' => '20', 'value' => '20'],
        ];
        $positions = Position::all();
        $titles = Title::all();
        $provinces = Province::all();
        return view($this->view_create, compact('years_experiences', 'positions', 'titles','provinces'));
    }

    /**
     * Store a newly created Player in storage.
     *
     * @param CreatePlayerRequest $request
     *
     * @return Response
     */
    public function store(CreatePlayerRequest $request)
    {
        /** @var Player $player */
        DB::beginTransaction();
        $input = $request->validated();
        $player = new Player;
        if ($request->hasFile('image')) {
            $url = $request->image->store('jugadores', 'public');
            $image = new Images();
            $image->url = $url;
        }
        $player->name = $input['name'];
        $player->province_id = $input['province_id'];
        $player->measure = $input['measure'];
        $player->weigth = $input['weigth'];
        $player->years_experience = $input['years_experience'];
        $translations = [
            'es' => $input['about_player_es'],
            'en' => $input['about_player_en']
        ];
        $player->setTranslations('about_player', $translations);
        if ($player->save()) {
            $player->positions()->attach($request->positions);
            $player->image()->save($image ?: '');

            $player_titles = json_decode($request->playerstitles);
            $cantidad_player_titles = count($player_titles);

            for ($i = 0, $iMax = $cantidad_player_titles; $i < $iMax; $i++) {
                PlayerTitle::create([
                    'amount' => $player_titles[$i]->amount,
                    'title_id' => $player_titles[$i]->name,
                    'player_id' => $player->id,

                ]);
            }
            DB::commit();
            return $this->redirectSuccess(__('balonmano.add-content', ['contenido' => 'Jugador']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Jugador']));
    }

    /**
     * Display the specified Player.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Player $player */

    }

    /**
     * Show the form for editing the specified Player.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Player $player */
        $player = Player::find($id);
        if (empty($player))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Jugador']));

        $years_experiences = [
            ['id' => '1', 'value' => '1'],
            ['id' => '2', 'value' => '2'],
            ['id' => '3', 'value' => '3'],
            ['id' => '4', 'value' => '4'],
            ['id' => '5', 'value' => '5'],
            ['id' => '6', 'value' => '6'],
            ['id' => '7', 'value' => '7'],
            ['id' => '8', 'value' => '8'],
            ['id' => '9', 'value' => '9'],
            ['id' => '10', 'value' => '10'],
            ['id' => '11', 'value' => '11'],
            ['id' => '12', 'value' => '12'],
            ['id' => '13', 'value' => '13'],
            ['id' => '14', 'value' => '14'],
            ['id' => '15', 'value' => '15'],
            ['id' => '16', 'value' => '16'],
            ['id' => '17', 'value' => '17'],
            ['id' => '18', 'value' => '18'],
            ['id' => '19', 'value' => '19'],
            ['id' => '20', 'value' => '20'],
        ];
        $positions = Position::all();
        $player_titles = PlayerTitle::where('player_id', $player->id)->get();
        $titles = Title::all();
        $provinces = Province::all();
        $player->positions = $player->positions()->get()->modelKeys();

        return view($this->view_edit, compact('player', 'positions', 'titles', 'years_experiences', 'player_titles','provinces'));
    }

    /**
     * Update the specified Player in storage.
     *
     * @param int $id
     * @param UpdatePlayerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlayerRequest $request)
    {
        /** @var Player $player */
        DB::beginTransaction();
        $player = Player::find($id);
        $player_titlesBD = PlayerTitle::where('player_id', $player->id)->get();
        $input = $request->validated();
        if ($request->hasFile('image')) {
            $old_file = $player->image->url;
            $url = $request->image->store('jugadores', 'public');
            if ($old_file)
                Storage::disk('public')->delete($old_file);
            $player->image()->update(['url' => $url]);
        }
        $player->name = $input['name'];
        $player->province_id = $input['province_id'];
        $player->measure = $input['measure'];
        $player->weigth = $input['weigth'];
        $player->years_experience = $input['years_experience'];
        $translations = [
            'es' => $input['about_player_es'],
            'en' => $input['about_player_en']
        ];
        $player->setTranslations('about_player', $translations);

        if ($player->update()) {
            $player->positions()->detach();
            $player->positions()->attach($request->positions);
            if ($request->playerstitles_eliminados_BD) {
                $player_titles_eliminados = json_decode($request->playerstitles_eliminados_BD);
                $cantidad_player_titles_eliminados = count($player_titles_eliminados);

                if ($cantidad_player_titles_eliminados > 0) {
                    foreach ($player_titles_eliminados as $titulos)
                        PlayerTitle::destroy($titulos);
                }
            }

            $player_titles = json_decode($request->playerstitles);
            $cantidad_player_titles = count($player_titles);

            for ($i = 0, $iMax = $cantidad_player_titles; $i < $iMax; $i++) {

                if (!isset($player_titles[$i]->idbd)) {
                    PlayerTitle::create([
                        'amount' => $player_titles[$i]->amount,
                        'title_id' => $player_titles[$i]->name,
                        'player_id' => $player->id,

                    ]);
                } else {

                    foreach ($player_titlesBD as $titulos) {

                        if ($titulos->id == $player_titles[$i]->idbd) {
                            $titulos->update([
                                'amount' => $player_titles[$i]->amount,
                                'title_id' => $player_titles[$i]->name,
                                'player_id' => $player->id,
                            ]);
                        }
                    }

                }
            }
            DB::commit();
            return $this->redirectSuccess(__('balonmano.edit-content', ['contenido' => 'Jugador']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Jugador']));
    }

    /**
     * Remove the specified Player from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Player $player */
        DB::beginTransaction();
        $player = Player::find($id);
        if (empty($player))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Jugador']));

        if ($player) {
            Storage::disk('public')->delete($player->image->url);
            $player->image->delete();
            Player::destroy($id);
            DB::commit();
            return $this->redirectSuccess(__('balonmano.delete-content', ['contenido' => 'Jugador']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Jugador']));
    }
}
