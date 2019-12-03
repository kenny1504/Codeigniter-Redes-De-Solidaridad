<?php namespace App\Controllers;
use App\Models\grados;

use CodeIgniter\Controller;

class docente extends BaseController
{
    public function cargardoc()
	{
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION  
        $db = \Config\Database::connect(); // concexion con la basse de datos
        $clave=$this->request->getPost('datepickerOferta'); 
        
        $consulta="SELECT docentes.id AS id,CONCAT (personas.Nombre,' ',personas.Apellido1,' ',personas.Apellido2) AS Nombre FROM docentes 
        JOIN personas on personas.id=docentes.personasid WHERE NOT EXISTS(SELECT * FROM ofertas WHERE ofertas.Docenteid=docentes.id AND YEAR(ofertas.FechaOferta)=2018)";

 
                        $data = $db->query($consulta); //Envia la consulta a la base de datos     
                        return json_encode($data->getResultArray());// retorna 
    }
    public function cargargrados()
	{
       
            $grados = new grados();
            $result= $grados->findAll();
            return json_encode($result);
        
	   
	}
}