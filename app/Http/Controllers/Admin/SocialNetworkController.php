<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSocialNetworkRequest;
use App\Http\Requests\UpdateSocialNetworkRequest;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class SocialNetworkController extends Controller
{
    public function __construct()
    {
        $this->view_index = 'admin.redessociales.index';
        $this->view_create = 'admin.redessociales.create';
        $this->view_edit = 'admin.redessociales.edit';
        $this->view_show = 'admin.redessociales.show';

        $this->route_index = 'admin.content.redes-sociales.index';
        $this->route_create = 'admin.content.redes-sociales.create';
        $this->route_edit = 'admin.content.redes-sociales.edit';
        $this->route_show = 'admin.content.redes-sociales.show';

        $this->middleware('hasPermission:redes-sociales.create')->only(['create', 'store']);
        $this->middleware('hasPermission:redes-sociales.destroy')->only(['destroy']);
        $this->middleware('hasPermission:redes-sociales.index')->only(['index']);
        $this->middleware('hasPermission:redes-sociales.edit')->only(['update', 'edit']);
    }
    /**
     * Display a listing of the SocialNetwork.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var SocialNetwork $socialNetworks */
        $count = count(SocialNetwork::all());
        $socialNetworks = SocialNetwork::latest()->paginate($count);

        return view($this->view_index, compact('socialNetworks'));
    }

    /**
     * Show the form for creating a new SocialNetwork.
     *
     * @return Response
     */
    public function create()
    {
        $type_social_networks = [
            ['id' => '1', 'value' => 'Facebook'],
            ['id' => '2', 'value' => 'Instagram'],
            ['id' => '3', 'value' => 'Twitter'],
            ['id' => '4', 'value' => 'Youtube'],
        ];
        return view($this->view_create,compact('type_social_networks'));
    }

    /**
     * Store a newly created SocialNetwork in storage.
     *
     * @param CreateSocialNetworkRequest $request
     *
     * @return Response
     */
    public function store(CreateSocialNetworkRequest $request)
    {

        /** @var SocialNetwork $socialNetwork */
        DB::beginTransaction();
        $input = $request->validated();
        if (SocialNetwork::create($input)) {
            DB::commit();
            return $this->redirectSuccess(__('balonmano.add-content', ['contenido' => 'Red Social']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Red Social']));
    }

    /**
     * Display the specified SocialNetwork.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SocialNetwork $socialNetwork */
        /*$socialNetwork = SocialNetwork::find($id);

        if (empty($socialNetwork)) {
            Flash::error('Social Network not found');

            return redirect(route('socialNetworks.index'));
        }

        return view('social_networks.show')->with('socialNetwork', $socialNetwork);*/
    }

    /**
     * Show the form for editing the specified SocialNetwork.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SocialNetwork $socialNetwork */
        $type_social_networks = [
            ['id' => '1', 'value' => 'Facebook'],
            ['id' => '2', 'value' => 'Instagram'],
            ['id' => '3', 'value' => 'Twitter'],
            ['id' => '4', 'value' => 'Youtube'],
        ];
        $socialNetwork = SocialNetwork::find($id);

        if (empty($socialNetwork))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Red Social']));

        return view($this->view_edit, compact('socialNetwork','type_social_networks'));
    }

    /**
     * Update the specified SocialNetwork in storage.
     *
     * @param int $id
     * @param UpdateSocialNetworkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSocialNetworkRequest $request)
    {
        /** @var SocialNetwork $socialNetwork */
        DB::beginTransaction();
        $socialNetwork = SocialNetwork::find($id);
        $input = $request->validated();
        if (empty($socialNetwork)) {
            DB::commit();
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Red Social']));
        }
        if ($socialNetwork->update($input)) {
            DB::commit();
            return $this->redirectSuccess(__('balonmano.edit-content', ['contenido' => 'Red Social']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Red Social']));
    }

    /**
     * Remove the specified SocialNetwork from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SocialNetwork $socialNetwork */
        DB::beginTransaction();
        $socialNetwork = SocialNetwork::find($id);
        if (empty($socialNetwork))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Red Social']));

        if ($socialNetwork) {
            SocialNetwork::destroy($id);
            DB::commit();
            return $this->redirectSuccess(__('balonmano.delete-content', ['contenido' => 'Red Social']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Red Social']));
    }
}
