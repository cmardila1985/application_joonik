<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * ApiKeyMiddleware
 *
 * Este middleware maneja la verificación de la API Key en las solicitudes entrantes.
 * El principio de **Responsabilidad Única (SRP)** se aplica aquí, ya que este middleware
 * se encarga exclusivamente de verificar si la API Key es válida, sin realizar ninguna
 * otra tarea adicional.
 *
 * Este middleware también sigue el principio de **Inversión de Dependencias (DIP)**,
 * ya que la clave de la API se obtiene de las variables de entorno, lo que permite una
 * fácil configuración y cambia el comportamiento sin modificar el código. Esto permite
 * que la lógica sea desacoplada de la implementación concreta de la API Key.
 */
class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Verifica si la solicitud contiene una clave API válida. Si la clave no es válida,
     * devuelve una respuesta de error con un código de estado HTTP 403 (Forbidden).
     *
     * El middleware es responsable solo de la verificación de la API Key. Si la API Key es
     * válida, permite que la solicitud continúe. De lo contrario, bloquea el acceso.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Obtener la clave de API desde los encabezados de la solicitud
        $apiKey = $request->header('X-API-KEY');

        // Verificar si la clave API es válida comparándola con la clave definida en el archivo de configuración
        if ($apiKey !== env('API_KEY')) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Si la clave API es válida, continuar con la siguiente etapa del ciclo de vida de la solicitud
        return $next($request);
    }
}
