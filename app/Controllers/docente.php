<?php namespace App\Controllers;

use CodeIgniter\Controller;

class docente extends BaseController
{
    public function cargardoc()
	{
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION  
        $db = \Config\Database::connect(); // concexion con la basse de datos
        
        $consulta="SELECT docentes.id AS id,CONCAT (personas.Nombre,' ',personas.Apellido1,' ',personas.Apellido2) AS Nombre FROM docentes 
        JOIN personas on personas.id=docentes.personasid";

                        $data['docentes'] = $db->query($consulta); //Envia la consulta a la base de datos
                        return json_encode($data);// retorna 
    }
}