<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Response;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->view_index = 'admin.contactos.index';
        $this->view_create = 'admin.contactos.create';
        $this->view_edit = 'admin.contactos.edit';
        $this->view_show = 'admin.contactos.show';

        $this->route_index = 'admin.content.contactos.index';
        $this->route_create = 'admin.content.contactos.create';
        $this->route_edit = 'admin.content.contactos.edit';
        $this->route_show = 'admin.content.contactos.show';

        $this->middleware('hasPermission:contactos.create')->only(['create', 'store']);
        $this->middleware('hasPermission:contactos.destroy')->only(['destroy']);
        $this->middleware('hasPermission:contactos.index')->only(['index']);
        $this->middleware('hasPermission:contactos.edit')->only(['update', 'edit']);
    }
    /**
     * Display a listing of the Contact.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Contact $contacts */
        $count = count(Contact::all());
        $contacts = Contact::latest()->paginate($count);

        return view($this->view_index, compact('contacts'));
    }

    /**
     * Show the form for creating a new Contact.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->view_create);
    }

    /**
     * Store a newly created Contact in storage.
     *
     * @param CreateContactRequest $request
     *
     * @return Response
     */
    public function store(CreateContactRequest $request)
    {
        /** @var Contact $contact */
        DB::beginTransaction();
        $input = $request->validated();
        $contact = new Contact;
        $contact->telephone = $input['telephone'];
        $contact->email = $input['email'];
        $translations = [
            'es' => $input['address_es'],
            'en' => $input['address_en']
        ];
        $contact->setTranslations('address', $translations);
        if ($contact->save()) {
            DB::commit();
            return $this->redirectSuccess(__('balonmano.add-content', ['contenido' => 'Contacto']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Contacto']));
    }

    /**
     * Display the specified Contact.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Contact $contact */
        /*$contact = Contact::find($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        return view('contacts.show')->with('contact', $contact);*/
    }

    /**
     * Show the form for editing the specified Contact.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Contact $contact */
        $contact = Contact::find($id);
        if (empty($contact))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Contacto']));

        return view($this->view_edit, compact('contact'));
    }

    /**
     * Update the specified Contact in storage.
     *
     * @param int $id
     * @param UpdateContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactRequest $request)
    {
        /** @var Contact $contact */
        DB::beginTransaction();
        $contact = Contact::find($id);
        $input = $request->validated();
        $contact->telephone = $input['telephone'];
        $contact->email = $input['email'];
        $translations = [
            'es' => $input['address_es'],
            'en' => $input['address_en']
        ];
        $contact->setTranslations('address', $translations);
        if (empty($contact)) {
            DB::commit();
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Contacto']));
        }
        if ($contact->update()) {
            DB::commit();
            return $this->redirectSuccess(__('balonmano.edit-content', ['contenido' => 'Contacto']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Contacto']));
    }

    /**
     * Remove the specified Contact from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Contact $contact */
        DB::beginTransaction();
        $contact = Contact::find($id);
        if (empty($contact))
            return $this->redirectFailed(__('balonmano.error-content-no-found', ['contenido' => 'Contacto']));

        if ($contact) {
            Contact::destroy($id);
            DB::commit();
            return $this->redirectSuccess(__('balonmano.delete-content', ['contenido' => 'Contacto']));
        }
        DB::rollback();
        return $this->redirectFailed(__('balonmano.error-content', ['contenido' => 'Contacto']));
    }
}
