<?php

namespace App\Http\Controllers;

use App\Contracts\UserProviderInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 *
 * Controlador encargado de manejar la lógica relacionada con los usuarios.
 *
 *  SRP (Single Responsibility Principle - Principio de Responsabilidad Única):
 *     Este controlador tiene una única responsabilidad: manejar la solicitud y respuesta para usuarios.
 *
 *  DIP (Dependency Inversion Principle - Principio de Inversión de Dependencias):
 *     En lugar de depender directamente del modelo User o de una implementación concreta,
 *     depende de una abstracción (UserProviderInterface), lo que permite inyectar diferentes implementaciones.
 */
class UserController extends Controller
{
    // Dependencia inyectada que cumple con el contrato definido en UserProviderInterface
    protected UserProviderInterface $userProvider;

    /**
     * Constructor con inyección de dependencias.
     *
     * @param  UserProviderInterface  $userProvider  Implementación concreta inyectada del proveedor de usuarios.
     */
    public function __construct(UserProviderInterface $userProvider)
    {
        $this->userProvider = $userProvider;
    }

    /**
     * Retorna una lista de usuarios en formato JSON.
     */
    public function index(): JsonResponse
    {
        $users = $this->userProvider->getUsers();

        return response()->json($users);
    }
}
