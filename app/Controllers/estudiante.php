<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class estudiante extends BaseController
{
	public function index()
	{
        $db = \Config\Database::connect(); // concexion con la basse de datos
        
        $consulta="SELECT e.id,e.CodigoEstudiante,CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre, p.Sexo,p.Direccion,CONCAT(pe.Nombre,' ',pe.Apellido1,' ',pe.Apellido2) as Nombre_tutor,pe.Telefono
        FROM estudiantes as e JOIN personas as p on p.id=e.personasid
        join tutores as t on e.tutorid=t.id join personas as pe on pe.id=t.personasid";

        $data['Estudiantes'] = $db->query($consulta); //Envia la consulta a la base de datos
        return view('/Estudiante/index.blade.php',$data);// retorna vista y se envian datos 

	}


}
