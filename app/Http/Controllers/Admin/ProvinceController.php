<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateProvinceRequest;
use App\Http\Requests\UpdateProvinceRequest;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Response;

class ProvinceController extends Controller
{
    public function __construct()
    {
        $this->view_index = 'admin.provincias.index';
        $this->view_create = 'admin.provincias.create';
        $this->view_edit = 'admin.provincias.edit';
        $this->view_show = 'admin.provincias.show';

        $this->route_index = 'admin.nomenclator.provincias.index';
        $this->route_create = 'admin.nomenclator.provincias.create';
        $this->route_edit = 'admin.nomenclator.provincias.edit';
        $this->route_show = 'admin.nomenclator.provincias.show';

        $this->middleware('hasPermission:provincias.create')->only(['create', 'store']);
        $this->middleware('hasPermission:provincias.destroy')->only(['destroy']);
        $this->middleware('hasPermission:provincias.index')->only(['index']);
        $this->middleware('hasPermission:provincias.edit')->only(['update', 'edit']);
    }
    /**
     * Display a listing of the Province.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Province $provinces */
        $count = count(Province::all());
        $provinces = Province::latest()->paginate($count);

        return view($this->view_index, compact('provinces'));
    }

    /**
     * Show the form for creating a new Province.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->view_create);
    }

    /**
     * Store a newly created Province in storage.
     *
     * @param CreateProvinceRequest $request
     *
     * @return Response
     */
    public function store(CreateProvinceRequest $request)
    {
        /** @var Province $province */
        DB::beginTransaction();
        $input = $request->validated();
        if (Province::create($input)) {
            DB::commit();
            return $this->redirectSuccess(__('balonmano.add-content', ['contenido' => 'Provincia']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Provincia']));
    }

    /**
     * Display the specified Province.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Province $province */
        /*$province = Province::find($id);

        if (empty($province)) {
            Flash::error('Province not found');

            return redirect(route('provinces.index'));
        }

        return view('provinces.show')->with('province', $province);*/
    }

    /**
     * Show the form for editing the specified Province.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Province $province */
        $province = Province::find($id);
        if (empty($province))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Provincia']));

        return view($this->view_edit, compact('province'));
    }

    /**
     * Update the specified Province in storage.
     *
     * @param int $id
     * @param UpdateProvinceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProvinceRequest $request)
    {
        /** @var Province $province */
        DB::beginTransaction();
        $province = Province::find($id);
        $input = $request->validated();
        if (empty($province)) {
            DB::commit();
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Provincia']));
        }
        if ($province->update($input)) {
            DB::commit();
            return $this->redirectSuccess(__('balonmano.edit-content', ['contenido' => 'Provincia']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Provincia']));

        $province = Province::find($id);
    }

    /**
     * Remove the specified Province from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Province $province */
        DB::beginTransaction();
        $province = Province::find($id);
        if (empty($province))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Provincia']));

        if ($province) {
            Province::destroy($id);
            DB::commit();
            return $this->redirectSuccess(__('balonmano.delete-content', ['contenido' => 'Provincia']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Provincia']));

        $province = Province::find($id);
    }
}
