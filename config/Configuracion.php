<?php

/**
 * Clase que maneja los datos de configuraci&oacute;n de la aplicaci&oacute;n.
 * Esta clase no debe ser instanciada.
 *
 * @author Wilman Vega <wilmanvega@gmail.com>
 */

final class Configuracion {

    /**
     * Arreglo que maneja los datos de configuraci&oacute;n.
     * @var Array 
     */
    private static $datos;

    public static function getConfiguracion($seccion = null) {
        if ($seccion === null) {
            return self::getDatos();
        }
        $datos = self::getDatos();
        if(!array_key_exists($seccion, $datos)){ //Verifica que la sección exista en el arreglo de configuración.
            throw new Exception('No se conoce esta seccion en la configuracion: '.$seccion);
        }
        return $datos[$seccion];
    }

    private static function getDatos() {
        if (self::$datos !== null) {
            return self::$datos;
        }
        self::$datos = parse_ini_file('configuracion.ini', true); //Analiza el archivo y retorna los valores de configuracion
                                                                  // en el arreglo.
        return self::$datos;
    }
}

?>
