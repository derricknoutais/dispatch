<?php

namespace App\Http\Controllers;

use DB;
use App\Boisson;
use App\Livraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livraisons = Auth::user()->entreprises[0]->livraisons;

        return view('livraison.index', compact('livraisons'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $livraison = Livraison::create([
            'nom' => $request->nom,
            'état' => 'en-cours',
            'entreprise_id' => Auth::user()->entreprises[0]->id
        ]);
        if($livraison)
            return redirect()->back();
    }

    public function storeProduit(Request $request)
    {
        if( DB::table('boisson_livraison')->where(['livraison_id' => $request->livraison_id, 'boisson_id' => $request->id])->first()){

            DB::table('boisson_livraison')->where(['livraison_id' => $request->livraison_id, 'boisson_id' => $request->id])->update([
                'quantité' =>  $request->pivot['quantité']
            ]);

            return ; 
        }
        $insert = DB::table('boisson_livraison')->insertGetId([
            'livraison_id' => $request->livraison_id,
            'boisson_id' =>  $request->id,
            'quantité' => $request->pivot['quantité']
        ]);
        if($insert)
            return $insert;
    }

    public function validerLivraison(Livraison $livraison, Request $request){
        foreach ($request->boissons as $boisson) {

            $boissonReceptionnée = DB::table('boisson_livraison')->where('id', $boisson['pivot']['id'])->update([
                'quantité_livrée' => $boisson['pivot']['quantité_livrée']
            ]);
            if($boissonReceptionnée){
                Boisson::find($boisson['id'])->decrement('stock', $boisson['pivot']['quantité_livrée']);
            }
        };
        
        $livraison->update([
            'état' => 'livré'
        ]);
    }
    public function show(Livraison $livraison)
    {
        $livraison->loadMissing('boissons');
        $boissons = Boisson::all();
        return view('livraison.show', compact('livraison', 'boissons'));
    }

    public function edit(Livraison $livraison)
    {
        //
    }

    public function update(Request $request, Livraison $livraison)
    {
        //
    }

    public function destroy(Livraison $livraison)
    {
        //
    }
}
