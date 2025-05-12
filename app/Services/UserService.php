<?php

namespace App\Services;

use App\Contracts\UserProviderInterface;
use App\Models\User;

/**
 * Class UserService
 *
 * Servicio encargado de obtener la lista de usuarios desde la base de datos.
 *
 *  SRP (Single Responsibility Principle):
 *     Esta clase tiene una única responsabilidad: recuperar los datos de usuarios.
 *
 *  OCP (Open/Closed Principle):
 *     Esta clase puede ser extendida o reemplazada por otra fuente de datos (por ejemplo, API externa)
 *     sin necesidad de modificar el controlador o el resto del sistema.
 *
 *  DIP (Dependency Inversion Principle):
 *     Esta clase implementa la interfaz UserProviderInterface, lo que permite
 *     inyectarla en controladores que dependen de dicha abstracción.
 */
class UserService implements UserProviderInterface
{
    /**
     * Obtiene la lista de usuarios con los campos necesarios.
     *
     * @return array Lista de usuarios con id, nombre y correo electrónico.
     */
    public function getUsers(): array
    {
        return User::select('id', 'name', 'email')->get()->toArray();
    }
}
