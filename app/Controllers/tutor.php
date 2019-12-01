<?php namespace App\Controllers;

use CodeIgniter\Controller;

class tutor extends BaseController
{
	public function cargar()
	{
	}
	
    public function tutores() //metodo para cargar todos los tutores
    {
        $db = \Config\Database::connect(); // concexion con la basse de datos
        $consulta="SELECT t.id,CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre FROM tutores as t JOIN personas as p on p.id=t.personasid";
       
        $data = $db->query($consulta);//Envia la consulta a la base de datos 
        return json_encode($data->getResultArray());

    }
}