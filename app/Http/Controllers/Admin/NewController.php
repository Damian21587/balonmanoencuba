<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewRequest;
use App\Http\Requests\UpdateNewRequest;
use App\Models\Images;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;
use Response;

class NewController extends Controller
{
    public function __construct()
    {
        $this->view_index = 'admin.noticias.index';
        $this->view_create = 'admin.noticias.create';
        $this->view_edit = 'admin.noticias.edit';
        $this->view_show = 'admin.noticias.show';

        $this->route_index = 'admin.content.noticias.index';
        $this->route_create = 'admin.content.noticias.create';
        $this->route_edit = 'admin.content.noticias.edit';
        $this->route_show = 'admin.content.noticias.show';

        $this->middleware('hasPermission:noticias.create')->only(['create', 'store']);
        $this->middleware('hasPermission:noticias.destroy')->only(['destroy']);
        $this->middleware('hasPermission:noticias.index')->only(['index']);
        $this->middleware('hasPermission:noticias.edit')->only(['update', 'edit']);
    }

    /**
     * Display a listing of the New.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var New $news */
        $count = count(News::all());
        $news = News::latest()->paginate($count);

        return view($this->view_index, compact('news'));
    }

    /**
     * Show the form for creating a new New.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->view_create);
    }

    /**
     * Store a newly created New in storage.
     *
     * @param CreateNewRequest $request
     *
     * @return Response
     */
    public function store(CreateNewRequest $request)
    {
        /** @var New $new */
        DB::beginTransaction();
        $input = $request->validated();
        if ($request->hasFile('image')) {
            $url = $request->image->store('noticias', 'public');
            $image = new Images();
            $image->url = $url;
        }

        $new = new News();
        $new->publication_date = $input['publication_date'];
        $translations_description = [
            'es' => $input['description_es'],
            'en' => $input['description_en']
        ];
        $translation_titles = [
            'es' => $input['title_es'],
            'en' => $input['title_en']
        ];
        $new->setTranslations('description', $translations_description);
        $new->setTranslations('title', $translation_titles);
        if ($new->save()) {
            $new->image()->save($image ?: '');
            DB::commit();
            return $this->redirectSuccess(__('balonmano.add-content', ['contenido' => 'Noticia']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Noticia']));
    }

    /**
     * Display the specified New.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var New $new */
        /*$new = New::find($id);

        if (empty($new)) {
            Flash::error('New not found');

            return redirect(route('news.index'));
        }

        return view('news.show')->with('new', $new);*/
    }

    /**
     * Show the form for editing the specified New.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var New $new */
        $new = News::find($id);
        if (empty($new))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Noticia']));

        return view($this->view_edit, compact('new'));
    }

    /**
     * Update the specified New in storage.
     *
     * @param int $id
     * @param UpdateNewRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewRequest $request)
    {
        /** @var New $new */
        DB::beginTransaction();
        $new = News::find($id);
        $input = $request->validated();
        if ($request->hasFile('image')) {
            $old_file = $new->image->url;
            $url = $request->image->store('noticias', 'public');
            if ($old_file)
                Storage::disk('public')->delete($old_file);
            $new->image()->update(['url' => $url]);
        }
        $new->publication_date = $input['publication_date'];
        $translations_description = [
            'es' => $input['description_es'],
            'en' => $input['description_en']
        ];
        $translations_title = [
            'es' => $input['title_es'],
            'en' => $input['title_en']
        ];
        $new->setTranslations('description', $translations_description);
        $new->setTranslations('title', $translations_title);
        if (empty($new)) {
            DB::commit();
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Quienes Somos']));
        }
        if ($new->update()) {
            DB::commit();
            return $this->redirectSuccess(__('balonmano.edit-content', ['contenido' => 'Quienes Somos']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Quienes Somos']));
    }

    /**
     * Remove the specified New from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var New $new */
        DB::beginTransaction();
        $new = News::find($id);
        if (empty($new))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Quienes Somos']));

        if ($new) {
            Storage::disk('public')->delete($new->image->url);
            $new->image->delete();
            News::destroy($id);
            DB::commit();
            return $this->redirectSuccess(__('balonmano.delete-content', ['contenido' => 'Quienes Somos']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Quienes Somos']));
    }
}
