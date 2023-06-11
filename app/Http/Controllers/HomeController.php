<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Komponen;
use App\Models\Sdm;
use App\Models\Software;
use App\Models\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $asset=count(Asset::all());
        $software=count(Software::all());
        $komponen=count(Komponen::all());
        $sdm=count(Sdm::all());
        $log=Log::all();
        return view('home',compact('asset','software','komponen','sdm','log'));
    }
    public function getEditProfil()
    {
        $id=Auth::user()->id;
        return view('/Auth.edit');

    }
}
