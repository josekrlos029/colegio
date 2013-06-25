<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DoncenteControl
 *
 * @author AndyHenry
 */
class DocenteControl extends Controlador{
    
    public function __construct($modelo, $accion) {
        parent::__construct($modelo, $accion);
        $this->setModelo($modelo);
    }
    /**
         * Imprime la Vista principal del Usuario Docente
         * @return type
         */
        public function usuarioDocente(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Usuario Docente');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
        public function consultarDocente(){
        try {
            
            $idPersona =  isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            
            $persona = new Persona();
            $docente = $persona->leerPorId($idPersona);
         
                $rol = new Rol();
                $roles = $rol->leerRoles($idPersona);
                $band = 0;
                foreach ($roles  as $ro) {
                  if ($ro->getIdRol() == 'D'){
                      $band=1;
                  } 
                }
                   
                  
                        $respuesta = "<table> 
                                       <tr>
                                        <td>Nombres:</td>
                                         <td>Primer Apellido:</td>
                                         <td>Segundo Apellido:</td>
                                         <td>Sexo:</td>
                                         <td>Telefono:</td>
                                         <td>Direccion:</td>
                                         <td>Correo:</td>
                                         <td>Fecha De Nacimiento:</td>
                                        </tr>
                                        
                                        <tr>
                                        <td>".$docente->getNombres()."</td>
                                        <td>".$docente->getPApellido()."</td>
                                        <td>".$docente->getSApellido()."</td>
                                        <td>".$docente->getSexo()."</td>
                                        <td>".$docente->getTelefono()."</td>
                                        <td>".$docente->getDireccion()."</td>
                                        <td>".$docente->getCorreo()."</td>
                                        <td>".$docente->getFNacimiento()->format('Y-m-d')."</td>
                                        </tr>
                                    </table>

                                     "; 
                  
              
              
            echo json_encode($respuesta);
    } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
            
         }
        
}

?>
