<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

class matricula extends BaseController
{
	public function index()
	{
        
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION  
        $db = \Config\Database::connect(); // concexion con la basse de datos
        
        $consulta="SELECT e.personasid,e.id,e.CodigoEstudiante,CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre, p.Sexo,p.Direccion,CONCAT(pe.Nombre,' ',pe.Apellido1,' ',pe.Apellido2) as Nombre_tutor,pe.Telefono
        FROM estudiantes as e JOIN personas as p on p.id=e.personasid
        join tutores as t on e.tutorid=t.id join personas as pe on pe.id=t.personasid";

        $consulta1="SELECT t.id,p.Cedula, CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre, p.Sexo,p.Correo,p.Telefono,o.Nombre AS Oficio
        FROM tutores as t JOIN personas as p on p.id=t.personasid JOIN oficios as o ON o.id=t.Oficiosid";

        if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
	     {
                        $data['Estudiantes'] = $db->query($consulta);
                        $data1['Tutores'] = $db->query($consulta1); //Envia la consulta a la base de datos
                        return view('/Matricula/index.blade.php',$data+$data1);// retorna vista y se envian datos 
              }
             else
             {
                 return view('login.blade.php');
             }

    }
   
}