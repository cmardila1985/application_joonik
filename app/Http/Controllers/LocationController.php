<?php

namespace App\Http\Controllers;

use App\Contracts\LocationProviderInterface;

/**
 * LocationController
 *
 * Este controlador maneja las solicitudes relacionadas con las ubicaciones (sedes).
 * El principio de **Responsabilidad Única** (SRP) se aplica aquí, ya que este controlador
 * solo se encarga de interactuar con la interfaz de obtención de ubicaciones y no tiene
 * lógica adicional que no esté relacionada con este propósito.
 *
 * Este controlador también implementa el principio de **Inyección de Dependencias** (DIP),
 * ya que depende de la interfaz `LocationProviderInterface`, y no de una implementación concreta.
 * Esto permite que las implementaciones de la interfaz puedan ser cambiadas sin afectar la lógica
 * del controlador, favoreciendo la escalabilidad y la facilidad de prueba.
 */
class LocationController extends Controller
{
    /**
     * Instancia del proveedor de ubicaciones.
     *
     * @var LocationProviderInterface
     */
    protected $provider;

    /**
     * LocationController constructor.
     *
     * Utiliza **Inyección de Dependencias** para obtener una instancia de la clase
     * que implementa `LocationProviderInterface`. Esto cumple con el principio **Inversión
     * de Dependencias (DIP)** de SOLID, asegurando que el controlador no dependa de una
     * implementación concreta de la lógica de obtención de ubicaciones.
     */
    public function __construct(LocationProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Obtiene la lista de ubicaciones y las retorna como respuesta JSON.
     *
     * Este método sigue el principio de **Responsabilidad Única (SRP)** ya que su única
     * responsabilidad es delegar la obtención de las ubicaciones al proveedor configurado
     * y retornar la respuesta adecuada.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->provider->getLocations());
    }
}
