<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;
use Response;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->view_index = 'admin.quienessomos.index';
        $this->view_create = 'admin.quienessomos.create';
        $this->view_edit = 'admin.quienessomos.edit';
        $this->view_show = 'admin.quienessomos.show';

        $this->route_index = 'admin.content.quienes-somos.index';
        $this->route_create = 'admin.content.quienes-somos.create';
        $this->route_edit = 'admin.content.quienes-somos.edit';
        $this->route_show = 'admin.content.quienes-somos.show';

        $this->middleware('hasPermission:quienes-somos.create')->only(['create', 'store']);
        $this->middleware('hasPermission:quienes-somos.destroy')->only(['destroy']);
        $this->middleware('hasPermission:quienes-somos.index')->only(['index']);
        $this->middleware('hasPermission:quienes-somos.edit')->only(['update', 'edit']);
    }

    /**
     * Display a listing of the About.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var About $abouts */
        $count = count(About::all());
        $abouts = About::latest()->paginate($count);

        return view($this->view_index, compact('abouts'));
    }

    /**
     * Show the form for creating a new About.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->view_create);
    }

    /**
     * Store a newly created About in storage.
     *
     * @param CreateAboutRequest $request
     *
     * @return Response
     */
    public function store(CreateAboutRequest $request)
    {
        /** @var About $about */
        DB::beginTransaction();
        $input = $request->validated();
        $about = new About;
        if ($request->hasFile('image')) {
            $url = $request->image->store('quienessomos', 'public');
            $image = new Images();
            $image->url = $url;
        }
        $translations = [
            'es' => $input['description_es'],
            'en' => $input['description_en']
        ];
        $about->setTranslations('description', $translations);
        if ($about->save()) {
            DB::commit();
            $about->image()->save($image ?: '');
            return $this->redirectSuccess(__('balonmano.add-content', ['contenido' => 'Quienes Somos']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Quienes Somos']));
    }

    /**
     * Display the specified About.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var About $about */
        /*$about = About::find($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('abouts.index'));
        }

        return view('abouts.show')->with('about', $about);*/
    }

    /**
     * Show the form for editing the specified About.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var About $about */
        $about = About::find($id);
        if (empty($about))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Quienes Somos']));

        return view($this->view_edit, compact('about'));
    }

    /**
     * Update the specified About in storage.
     *
     * @param int $id
     * @param UpdateAboutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutRequest $request)
    {
        /** @var About $about */
        DB::beginTransaction();
        $about = About::find($id);
        $input = $request->validated();
        if ($request->hasFile('image')) {
            $old_file = $about->image->url;
            $url = $request->image->store('quienessomos', 'public');
            if ($old_file)
                Storage::disk('public')->delete($old_file);
            $about->image()->update(['url' => $url]);
        }
        $translations = [
            'es' => $input['description_es'],
            'en' => $input['description_en']
        ];
        $about->setTranslations('description', $translations);
        if (empty($about)) {
            DB::commit();
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Quienes Somos']));
        }
        if ($about->update()) {
            DB::commit();
            return $this->redirectSuccess(__('balonmano.edit-content', ['contenido' => 'Quienes Somos']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Quienes Somos']));
    }

    /**
     * Remove the specified About from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var About $about */
        DB::beginTransaction();
        $about = About::find($id);
        if (empty($about))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Quienes Somos']));

        if ($about) {
            Storage::disk('public')->delete($about->image->url);
            $about->image->delete();
            About::destroy($id);
            DB::commit();
            return $this->redirectSuccess(__('balonmano.delete-content', ['contenido' => 'Quienes Somos']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Quienes Somos']));
    }
}
