<?php

namespace App\Services;

use App\Contracts\LocationProviderInterface;

/**
 * Class LocationService
 *
 * Servicio encargado de proveer la lista de sedes.
 *
 *  SRP (Single Responsibility Principle):
 *     Esta clase tiene una única responsabilidad: proporcionar datos de sedes.
 *
 *  OCP (Open/Closed Principle):
 *     Esta clase puede ser extendida para obtener datos de una base de datos o una API externa
 *     sin modificar el controlador ni la interfaz.
 *
 *  DIP (Dependency Inversion Principle):
 *     Esta clase implementa una interfaz (LocationProviderInterface), lo cual permite
 *     inyectarla en otros componentes sin que estos conozcan su implementación concreta.
 */
class LocationService implements LocationProviderInterface
{
    /**
     * Devuelve una lista simulada de sedes.
     *
     * @return array Lista de sedes con código, nombre, imagen y fecha de creación.
     */
    public function getLocations(): array
    {
        return [
            [
                'code' => 1,
                'name' => 'Sede Norte',
                'image' => 'https://losviajesdeclaudia.com/wp-content/uploads/2024/04/plaza-bolivar-que-ver-en-bogota.jpg',
                'creationDate' => '2024-05-01',
            ],
            [
                'code' => 2,
                'name' => 'Sede Sur',
                'image' => 'https://losviajesdeclaudia.com/wp-content/uploads/2024/04/excursion-a-la-laguna-guatavita-y-el-dorado.jpg',
                'creationDate' => '2024-05-02',
            ],
            [
                'code' => 3,
                'name' => 'Sede Centro',
                'image' => 'https://losviajesdeclaudia.com/wp-content/uploads/2024/04/la-catedral-de-sal-de-zipaquira.jpg',
                'creationDate' => '2024-05-03',
            ],
        ];
    }
}
