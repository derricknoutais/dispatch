<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Boisson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // return $commandes = Auth::user()->commandes;
        // $livraisons = Auth::user()->livraisons;
        // return view('home', compact('commandes', 'livraisons'));
        $boissons = Boisson::all();
        return view('boisson.index', compact('boissons'));
    }
}
