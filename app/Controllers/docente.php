<?php namespace App\Controllers;
use App\Models\grados;

use CodeIgniter\Controller;

use App\Models\docentes;
use App\Models\personas;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;


class docente extends BaseController
{
    public function index()
	{
        
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION  
        $db = \Config\Database::connect(); // concexion con la basse de datos
        
        $consulta="SELECT d.id,p.Cedula, CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre, p.Sexo,p.Correo,p.Telefono
        FROM docentes as d JOIN personas as p on p.id=d.personasid";

        if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
	     {
                        $data['Docentes'] = $db->query($consulta); //Envia la consulta a la base de datos
                        return view('/Docente/index.blade.php',$data);// retorna vista y se envian datos 
              }
             else
             {
                 return view('login.blade.php');
             }

    }
    public function cargar($id) //funcion para recuperar datos del estudiante y el tutor en la tabla detalleAsignatura
	{
         $db = \Config\Database::connect(); // concexion con la basse de datos
   
       $consulta="SELECT p.Cedula,p.Nombre,p.Apellido1,p.Apellido2, p.Sexo,p.Direccion,p.Correo,p.Telefono,p.FechaNacimiento,d.Estado
       FROM docentes as d JOIN personas as p on p.id=d.personasid WHERE d.id=$id"; 
 
          $data = $db->query($consulta); //Envia la consulta a la base de datos 
          return json_encode($data->getResultArray());          
    }
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