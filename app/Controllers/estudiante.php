<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

class estudiante extends BaseController
{
	public function index()
	{
        
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION  
        $db = \Config\Database::connect(); // concexion con la basse de datos
        
        $consulta="SELECT e.id,e.CodigoEstudiante,CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre, p.Sexo,p.Direccion,CONCAT(pe.Nombre,' ',pe.Apellido1,' ',pe.Apellido2) as Nombre_tutor,pe.Telefono
        FROM estudiantes as e JOIN personas as p on p.id=e.personasid
        join tutores as t on e.tutorid=t.id join personas as pe on pe.id=t.personasid";

        if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
	     {
                        $data['Estudiantes'] = $db->query($consulta); //Envia la consulta a la base de datos
                        return view('/Estudiante/index.blade.php',$data);// retorna vista y se envian datos 
              }
             else
             {
                 return view('login.blade.php');
             }

    }
    public function cargar($id) //funcion para recuperar datos del estudiante y el tutor en la tabla detalleAsignatura
	{
         $db = \Config\Database::connect(); // concexion con la basse de datos
   
       $consulta="SELECT e.CodigoEstudiante,p.Nombre,p.Apellido1,p.Apellido2,p.FechaNacimiento,p.Sexo,par.Parentesco,p.Telefono,p.Direccion,
        pe.Cedula,pe.Nombre as Nombret,pe.Apellido1 as apellido1t,pe.Apellido2 as apellido2t,pe.FechaNacimiento as fechat,p.Sexo as sexot,
        pe.Correo as correot,pe.Telefono as telefonot,pe.Direccion as dirrecciont,o.Nombre as oficiot
                FROM estudiantes as e JOIN personas as p on p.id=e.personasid
                join tutores as t on e.tutorid=t.id join personas as pe on pe.id=t.personasid
                join oficios as o on o.id=t.Oficiosid
                JOIN parentescos as par on par.id=e.parentescoid WHERE e.id='".$id."' "; 
 
          $data = $db->query($consulta); //Envia la consulta a la base de datos 
          return json_encode($data->getResultArray());          
    }
    public function tutores() //metodo para cargar todos los tutores
    {
        $db = \Config\Database::connect(); // concexion con la basse de datos
        $consulta="SELECT t.id,CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre FROM tutores as t JOIN personas as p on p.id=t.personasid";
       
        $data = $db->query($consulta);//Envia la consulta a la base de datos 
        return json_encode($data->getResultArray());

    }
    public function parentesco() //metodo para cargar todos los tutores
    {
        $db = \Config\Database::connect(); // concexion con la basse de datos
        $consulta="SELECT p.id , p.Parentesco FROM parentescos as p";
       
        $data = $db->query($consulta);//Envia la consulta a la base de datos 
        return json_encode($data->getResultArray());

    }

}
