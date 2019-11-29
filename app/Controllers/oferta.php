<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ofertas;
use CodeIgniter\HTTP\Request;

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
  public function guardar() //funcion para guardar en la tabla oferta
	{
        $oferta = new ofertas();
        $iddescripcion=$this->request->getPost('Descripcion-Oferta');   //variable que recive los valores del iddescripcion
        $idfecha='2019-08-08';
        $iddocente=$this->request->getPost('Docente');   //variable que recive los valores del iddocente
        $idseccion=$this->request->getPost('Seccion');   //variable que recive los valores del idseccion
        $idgrado=$this->request->getPost('Grado');   //variable que recive los valores del idgrado
        $idgrupo=$this->request->getPost('Grupo');   //variable que recive los valores del idgrupo


            $data = array (
                  'Descripcion' => $iddescripcion,
                  'FechaOferta' => $idfecha,		
                  'Seccionid' => $idseccion,	
                  'Gradoid' => $idgrado,	
                  'Grupoid' => $idgrupo,	
                  'Docenteid' => $iddocente	
                  );
              $result = $oferta->insert($data);// peticion para insertar la oferta en la tabla oferta
            
               return   json_encode(100);
               
      }
}