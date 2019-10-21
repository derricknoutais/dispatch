<?php

use Illuminate\Support\Facades\Auth;

if (App::environment('local')) {
    Auth::loginUsingId(1);

}
    

Route::get('/', function () {
    return view('welcome');
});



Route::resource('boisson', 'BoissonController');
Route::resource('commande', 'CommandeController');
Route::resource('flotte', 'FlotteController');
Route::resource('livraison', 'LivraisonController');

Route::post('/commande-produit', 'CommandeController@storeProduit');
Route::post('/livraison-produit', 'LivraisonController@storeProduit');

Route::post('/enregistrer-commande/{commande}', 'CommandeController@changerEtat');
Route::post('/enregistrer-modifications/{commande}', 'CommandeController@enregistrerModifications');

Route::post('/receptionner-boissons/{commande}', 'CommandeController@receptionnerBoissons');
Route::post('/valider-livraison/{livraison}', 'LivraisonController@validerLivraison');










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
