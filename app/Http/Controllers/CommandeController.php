<?php

namespace App\Http\Controllers;
use DB;
use App\Boisson;
use App\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Auth::user()->entreprises[0]->commandes;
        return view('commande.index', compact('commandes'));

    }

    public function store(Request $request)
    {
        $commande = Commande::create([
            'nom' => $request->nom,
            'état' => 'en-cours',
            'entreprise_id' => Auth::user()->entreprises[0]->id
        ]);
        if($commande)
            return redirect()->back();
    }

    public function storeProduit(Request $request){
        if( DB::table('boisson_commande')->where(['commande_id' => $request->commande_id, 'boisson_id' => $request->id])->first()){

            DB::table('boisson_commande')->where(['commande_id' => $request->commande_id, 'boisson_id' => $request->id])->update([
                'quantité' =>  $request->pivot['quantité']
            ]);
            return ; 
        }
        $insert = DB::table('boisson_commande')->insertGetId([
            'commande_id' => $request->commande_id,
            'boisson_id' =>  $request->id,
            'quantité' => $request->pivot['quantité']
        ]);
        if($insert)
            return $insert;
    }


    public function changerEtat(Commande $commande, Request $request){
        $commande->update([
            'état' => 'validé'
        ]);
    }

    public function enregistrerModifications(Commande $commande, Request $request){

        foreach ($request->boissons as $boisson) {
            DB::table('boisson_commande')->where('id', $boisson['pivot']['id'])->update([
                'quantité' => $boisson['pivot']['quantité']
            ]);
        };
        
    }

    public function receptionnerBoissons( Commande $commande, Request $request ){
        foreach ($request->boissons as $boisson) {

            $boissonReceptionnée = DB::table('boisson_commande')->where('id', $boisson['pivot']['id'])->update([
                'quantité_reçue' => $boisson['pivot']['quantité_reçue']
            ]);
            if($boissonReceptionnée){
                Boisson::find($boisson['id'])->increment('stock', $boisson['pivot']['quantité_reçue']);
            }
        };
        
        $commande->update([
            'état' => 'réceptionné'
        ]);
    }
    public function show(Commande $commande)
    {
        $commande->loadMissing('boissons');
        $boissons = Boisson::all();
        return view('commande.show', compact('commande', 'boissons'));
    }

    public function edit(Commande $commande)
    {
        //
    }

    public function update(Request $request, Commande $commande)
    {
        //
    }

    public function destroy(Commande $commande)
    {
        //
    }
}
