<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessageStoreRequest;
use App\Mail\ContactMessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function sendMessage(ContactMessageStoreRequest $request){
        $validated = $request->validated();
        $emailto = Config::get('mail.address_to');
        $datos = ['name' => $validated['name'],'email' => $validated['email'],'message' => $validated['message']];
        Mail::to($emailto)->send(new ContactMessageReceived($datos));

        return response()->json(array('success' => 'Gracias por enviarnos un comentario.'));
    }
}
