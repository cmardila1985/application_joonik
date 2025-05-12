<?php

namespace App\Contracts;

/**
 * Interface UserProviderInterface
 *
 * Esta interfaz define el contrato para obtener la lista de usuarios en el sistema.
 *
 *    Principio de Responsabilidad Única (SRP):
 *    Esta interfaz tiene una única responsabilidad: abstraer la lógica de obtención
 *    de usuarios, sin preocuparse por cómo se implementa o desde dónde proviene la data.
 *
 *    Principio de Segregación de Interfaces (ISP):
 *    Define una interfaz específica y pequeña, enfocada únicamente en lo que necesita
 *    un consumidor: `getUsers()`. Esto evita cargar al consumidor con métodos que no necesita.
 *
 *    Principio de Inversión de Dependencias (DIP):
 *    Los controladores o servicios que dependan de esta interfaz no necesitan saber
 *    nada de la implementación concreta. Esto facilita el cambio de fuente de datos
 *    (por ejemplo, base de datos, JSON, API externa) sin modificar el controlador.
 */
interface UserProviderInterface
{
    /**
     * Obtener una lista de usuarios.
     *
     * @return array Lista de usuarios como arrays asociativos con campos como 'id', 'name' y 'email'.
     */
    public function getUsers(): array;
}
