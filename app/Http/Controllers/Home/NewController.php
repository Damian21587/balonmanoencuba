<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index()
    {
        return view('home.noticias');
    }

    public function detallesNoticia($id)
    {
        $new = News::findOrFail($id);
        return view('home.detalles-noticias', compact('new'));
    }
}
