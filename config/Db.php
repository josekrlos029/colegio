<?php

/**
 * Me permite acceder a los datos de la B.D
 *
 * @author DELL
 */
class Db {

    private static $db;

    public static function init() {
        if (!self::$db) {
            try {
                $cfg = Configuracion::getConfiguracion('basedatos');
                $dsn = $cfg['dsn'];
                self::$db = new PDO($dsn, $cfg['usuario'], $cfg['clave']); //Crea un nuevo objeto PDO (PHP Data Object)
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Indica que lanza una excepción si existe algún error.
                self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //Establece la propiedad de asociacion para los resultados 
                                                                                         // de consulta
            } catch (PDOException $exc) {
                die('Error de conexion a la base de datos! '.$exc->getMessage());
            }
        }
        return self::$db;
    }

}

?>
