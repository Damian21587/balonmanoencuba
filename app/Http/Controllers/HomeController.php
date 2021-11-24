<?php

namespace App\Http\Controllers;

use App\Models\VisitCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       /* $this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session_id =Session::getId();
        $visitas = VisitCount::where("session_id" , $session_id)->get();
        if (count($visitas) === 0) {
            $visit_page = new VisitCount();
            $visit_page->page = "home";
            $visit_page->session_id = $session_id;
            $visit_page->save();
        }
        $cantidad_visitas = count(VisitCount::all());

        return view('home',compact('cantidad_visitas'));
    }
}
