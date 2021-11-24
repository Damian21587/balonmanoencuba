<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->view_index = 'admin.posiciones.index';
        $this->view_create = 'admin.posiciones.create';
        $this->view_edit = 'admin.posiciones.edit';
        $this->view_show = 'admin.posiciones.show';

        $this->route_index = 'admin.nomenclator.posiciones.index';
        $this->route_create = 'admin.nomenclator.posiciones.create';
        $this->route_edit = 'admin.nomenclator.posiciones.edit';
        $this->route_show = 'admin.nomenclator.posiciones.show';

        $this->middleware('hasPermission:posiciones.create')->only(['create', 'store']);
        $this->middleware('hasPermission:posiciones.destroy')->only(['destroy']);
        $this->middleware('hasPermission:posiciones.index')->only(['index']);
        $this->middleware('hasPermission:posiciones.edit')->only(['update', 'edit']);
    }

    /**
     * Display a listing of the Position.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Position $positions */
        $count = count(Position::all());
        $posiciones = Position::latest()->paginate($count);

        return view($this->view_index, compact('posiciones'));
    }

    /**
     * Show the form for creating a new Position.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->view_create);
    }

    /**
     * Store a newly created Position in storage.
     *
     * @param CreatePositionRequest $request
     *
     * @return Response
     */
    public function store(CreatePositionRequest $request)
    {
        /** @var Position $position */

        DB::beginTransaction();
        $input = $request->validated();
        $posicion = new Position;
        $translations = [
            'es' => $input['name_es'],
            'en' => $input['name_en']
        ];
        $posicion->setTranslations('name', $translations);
        if ($posicion->save()) {
            DB::commit();
            return $this->redirectSuccess(__('balonmano.add-content', ['contenido' => 'Posición']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Posición']));
    }

    /**
     * Display the specified Position.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Position $position */
        /*$position = Position::find($id);

        if (empty($position)) {
            Flash::error('Position not found');

            return redirect(route('positions.index'));
        }

        return view('positions.show')->with('position', $position);*/
    }

    /**
     * Show the form for editing the specified Position.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Position $position */
        $posicion = Position::find($id);

        if (empty($posicion))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Posición']));

        return view($this->view_edit, compact('posicion'));
    }

    /**
     * Update the specified Position in storage.
     *
     * @param int $id
     * @param UpdatePositionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePositionRequest $request)
    {
        /** @var Position $position */
        DB::beginTransaction();
        $posicion = Position::find($id);
        $input = $request->validated();
        $translations = [
            'es' => $input['name_es'],
            'en' => $input['name_en']
        ];
        $posicion->setTranslations('name', $translations);
        if (empty($posicion)) {
            DB::commit();
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Posición']));
        }
        if ($posicion->update()) {
            DB::commit();
            return $this->redirectSuccess(__('balonmano.edit-content', ['contenido' => 'Posición']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Posición']));
    }

    /**
     * Remove the specified Position from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Position $position */
        DB::beginTransaction();
        $posicion = Position::find($id);
        if (empty($posicion))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Posición']));

        if ($posicion) {
            Position::destroy($id);
            DB::commit();
            return $this->redirectSuccess(__('balonmano.delete-content', ['contenido' => 'Posición']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Posición']));
    }
}
