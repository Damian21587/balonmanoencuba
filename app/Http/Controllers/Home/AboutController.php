<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $quienes_somos = About::first();
        return view('home.quienes_somos',compact('quienes_somos'));
    }
}
