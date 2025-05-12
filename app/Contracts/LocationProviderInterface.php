<?php

namespace App\Contracts;

/**
 * Interface LocationProviderInterface
 *
 * Esta interfaz define el contrato para obtener las ubicaciones (sedes).
 * Siguiendo el principio de **Abstracción** de SOLID, la implementación
 * de este contrato debería ser proporcionada por una clase concreta que
 * obtenga los datos de las ubicaciones de una fuente de datos específica.
 *
 * También aplica el principio de **Responsabilidad Única (SRP)** ya que esta
 * interfaz se encarga únicamente de la responsabilidad de acceder a las ubicaciones,
 * sin mezclar otras preocupaciones.
 */
interface LocationProviderInterface
{
    /**
     * Obtener todas las ubicaciones disponibles.
     *
     * Este método devuelve un array de ubicaciones. Cada ubicación contiene
     * datos relevantes como el código, nombre, imagen y fecha de creación.
     *
     * La implementación de este método debe estar separada del controlador
     * y delegada a un servicio o repositorio que gestione la lógica de acceso
     * a los datos. Esto aplica el principio **Inversión de Dependencias (DIP)**,
     * ya que los controladores dependerán de esta interfaz y no de clases
     * concretas que accedan directamente a la base de datos o cualquier otro origen de datos.
     *
     * @return array Un array de ubicaciones con los datos necesarios.
     */
    public function getLocations(): array;
}
