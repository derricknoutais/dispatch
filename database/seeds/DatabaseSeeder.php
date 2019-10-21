<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $noms = ['Regab 65cl', 'Castel 65cl', 'Castel 33cl', '33 Export 65cl', '33 Export 33cl', '33 Export 65cl', 'Beaufort 50cl', 
            'Beaufort 33cl', 'Guiness 33cl', 'Grand Jus 60cl', 'Petit Jus 30cl', 'Castillo', 'Booster 33cl', 'Malta Guiness', 'XXL 30cl', 'Vino Cola 33cl' ];
        $imm = ['AA-111-AA', 'BB-222-BB', 'CC-333-CC'];


        factory('App\User', 10)->create()->each(function( $u ){
            $u->entreprises()->save( factory('App\Entreprise')->create() );
        });
        for ($i=0; $i < sizeof($noms); $i++) { 
            factory('App\Boisson')->create([
                'nom' => $noms[$i]
            ]);
        }

    }
}
