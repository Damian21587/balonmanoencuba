<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use App\Models\Title;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Response;

class TitleController extends Controller
{
    public function __construct()
    {
        $this->view_index = 'admin.titulos.index';
        $this->view_create = 'admin.titulos.create';
        $this->view_edit = 'admin.titulos.edit';
        $this->view_show = 'admin.titulos.show';

        $this->route_index = 'admin.nomenclator.titulos.index';
        $this->route_create = 'admin.nomenclator.titulos.create';
        $this->route_edit = 'admin.nomenclator.titulos.edit';
        $this->route_show = 'admin.nomenclator.titulos.show';

        $this->middleware('hasPermission:titulos.create')->only(['create', 'store']);
        $this->middleware('hasPermission:titulos.destroy')->only(['destroy']);
        $this->middleware('hasPermission:titulos.index')->only(['index']);
        $this->middleware('hasPermission:titulos.edit')->only(['update', 'edit']);
    }

    /**
     * Display a listing of the Title.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Title $titles */
        $count = count(Title::all());
        $titles = Title::latest()->paginate($count);

        return view($this->view_index, compact('titles'));
    }

    /**
     * Show the form for creating a new Title.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->view_create);
    }

    /**
     * Store a newly created Title in storage.
     *
     * @param CreateTitleRequest $request
     *
     * @return Response
     */
    public function store(CreateTitleRequest $request)
    {
        /** @var Title $title */
        DB::beginTransaction();
        $input = $request->validated();
        $title = new Title;
        $translations = [
            'es' => $input['name_es'],
            'en' => $input['name_en']
        ];
        $title->setTranslations('name', $translations);
        if ($title->save()) {
            DB::commit();
            return $this->redirectSuccess(__('balonmano.add-content', ['contenido' => 'Título']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Título']));
    }

    /**
     * Display the specified Title.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Title $title */
        /*$title = Title::find($id);

        if (empty($title)) {
            Flash::error('Title not found');

            return redirect(route('titulos.index'));
        }

        return view('titulos.show')->with('title', $title);*/
    }

    /**
     * Show the form for editing the specified Title.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Title $title */
        $title = Title::find($id);
        if (empty($title))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Título']));

        return view($this->view_edit, compact('title'));
    }

    /**
     * Update the specified Title in storage.
     *
     * @param int $id
     * @param UpdateTitleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTitleRequest $request)
    {
        /** @var Title $title */
        DB::beginTransaction();
        $title = Title::find($id);
        $input = $request->validated();
        $translations = [
            'es' => $input['name_es'],
            'en' => $input['name_en']
        ];
        $title->setTranslations('name', $translations);
        if (empty($title)) {
            DB::commit();
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Título']));
        }
        if ($title->update()) {
            DB::commit();
            return $this->redirectSuccess(__('balonmano.edit-content', ['contenido' => 'Título']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Título']));
    }

    /**
     * Remove the specified Title from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Title $title */
        DB::beginTransaction();
        $title = Title::find($id);
        if (empty($title))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Título']));

        if ($title) {
            Title::destroy($id);
            DB::commit();
            return $this->redirectSuccess(__('balonmano.delete-content', ['contenido' => 'Título']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Título']));
    }
}
