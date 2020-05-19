<?php

use Illuminate\Database\Seeder;
use App\Lugar;


class lugaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lugar = new Lugar();
        $lugar->municipioId = "1";
        $lugar->categoriaId = "1";
        $lugar->nombre = "Hotel Mediterrane.";
        $lugar->direccion = "Ignacio Allende 36, Zona Central.";
        $lugar->paginaWeb = "https://www.hotelmed.com/es/hotel-mediterrane/";
        $lugar->horario = "Abierto las 24 horas";
        $lugar->numTelefono = "6121232322";
        $lugar->descripcion = "Este tranquilo hotel frente a la playa de inspiración mediterránea y estilo mexicano se encuentra a 14 minutos a pie de la catedral.";
        $lugar->imagen = "hotelMediterrane.png";
        $lugar->latitud = 24.161702;
        $lugar->longitud = -110.312999 ;
        $lugar->save();
        

        $lugar = new Lugar();
        $lugar->municipioId = "1";
        $lugar->categoriaId = "5";
        $lugar->nombre = "Estadio de futbol guaycura.";
        $lugar->direccion = "Av. 5 de mayo y felix ortega.";
        $lugar->paginaWeb = "https://www.hotelmed.com/es/hotel-mediterrane/";
        $lugar->horario = "Abierto las 24 horas";
        $lugar->numTelefono = "6121232322";
        $lugar->descripcion = "Disfruta de los mejores partidos de futbol del estado.";
        $lugar->imagen = "estadioGuaycura.png";
        $lugar->latitud = 24.157038;
        $lugar->longitud = -110.303100;
        $lugar->save();

        $lugar = new Lugar();
        $lugar->municipioId = "2";
        $lugar->categoriaId = "1";
        $lugar->nombre = "Hotel Riu Palace.";
        $lugar->direccion = "Camino Viejo a San José Km 3.5, El Medano Ejidal, 23453 Cabo San Lucas, B.C.S.";
        $lugar->paginaWeb = "https://www.riu.com";
        $lugar->horario = "Abierto las 24 horas";
        $lugar->numTelefono = "624 163 1000";
        $lugar->descripcion = "Este hotel de lujo todo incluido para adultos";
        $lugar->imagen = "uploads/w1vrmF4kR3BoOGYk4wA67Jk7OF5Me2o2z6E6LuMc.jpeg";
        $lugar->latitud = 22.897189;
        $lugar->longitud = -109.89078;
        $lugar->save();
        

    }
}
