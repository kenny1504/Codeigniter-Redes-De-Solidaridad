<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ofertas;
class oferta extends BaseController
{
    public function index() //
	{ 
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION
        $db = \Config\Database::connect(); // concexion con la basse de datos
  
     $consulta="SELECT ofertas.id, ofertas.Descripcion,ofertas.FechaOferta,secciones.Codigo,grupos.Grupo,grados.Grado, CONCAT (personas.Nombre,' ',personas.Apellido1,' ',personas.Apellido2) AS Nombre_Docente
     FROM grupos INNER JOIN ofertas ON grupos.id = ofertas.Grupoid INNER JOIN grados ON grados.id=ofertas.Gradoid
     INNER JOIN secciones on secciones.id=ofertas.Seccionid INNER JOIN docentes on docentes.id=ofertas.Docenteid
     INNER JOIN personas on personas.id=docentes.personasid";
           
    if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
		  {
            $data['ofertas'] = $db->query($consulta); //Envia la consulta a la base de datos
             
            return view('/Oferta/index.blade.php',$data);// retorna vista y se envian datos 
        }
      else{
         return view('login.blade.php');
          } 
  }
}