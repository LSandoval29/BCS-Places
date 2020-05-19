<?php

use Illuminate\Database\Seeder;
use App\Municipio;

class municipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipio = new Municipio();
        $municipio->nombre="La Paz";
        $municipio->save();

        $municipio = new Municipio();
        $municipio->nombre="Los Cabos";
        $municipio->save();

        $municipio = new Municipio();
        $municipio->nombre="Comondú";
        $municipio->save();

        $municipio = new Municipio();
        $municipio->nombre="Loreto";
        $municipio->save();

        $municipio = new Municipio();
        $municipio->nombre="Múlege";
        $municipio->save();
    }
}
