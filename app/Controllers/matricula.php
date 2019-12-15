<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;
use App\Models\situacionmatriculas;
use App\Models\matriculas;

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

        if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
	     {
                        $data['Estudiantes'] = $db->query($consulta);
                        return view('/Matricula/index.blade.php',$data);// retorna vista y se envian datos 
              }
             else
             {
                 return view('login.blade.php');
             }

    }
    public function cargarmaterias_grado_M($id)
	{
		$db = \Config\Database::connect(); // concexion con la basse de datos
  
		////////////// CONSULTA A ENVIAR A MYSQL
		  $consulta= "SELECT gradoaasignaturas.id,asignaturas.Nombre FROM ofertas JOIN grados ON  ofertas.Gradoid=grados.id  JOIN gradoaasignaturas ON grados.id=gradoaasignaturas.Gradoid 
          JOIN asignaturas ON asignaturas.id=gradoaasignaturas.Asignaturaid WHERE ofertas.id=$id";
		   
		   $result=$db->query($consulta); //Envia la consulta a la base de datos
      if($result==true){
		
		return json_encode($result->getResultArray());

	  }
		else{
     
			return json_encode(false);
	 }
		   
  }
  
  public function guardar() //funcion para guardar en la tabla oferta
	{
        $db = \Config\Database::connect(); // concexion con la basse de datos
        $valor=0;  
        $situacionmatriculas=new situacionmatriculas();
        $situacion=$this->request->getPost('Situacion_Matricula');
        $data = array (
          'Descripcion' => $situacion		
        );
        $idsituacionmatriculas = $situacionmatriculas->insert($data);// pedicion para insertar nueva situacion
        if($idsituacionmatriculas==true)
        {
          $matriculas = new matriculas();
          $idfecha=$this->request->getPost('datepickerFechaMatricula');   //variable que recibe los valores del fecha matricula
          $idoferta=$this->request->getPost('Oferta_M');   //variable que recibe el id de la oferta seleccionada        
          $idturno=$this->request->getPost('Turno');   //variable que recibe los valores del turno   
          $idestudiante=$this->request->getPost('idestudiante_M');   //variable que recibe los valores del idestudiante


            $data1 = array (
                  'Fecha' => $idfecha,
                  'Ofertaid' => $idoferta,		
                  'Turnoid' => $idturno,	
                  'SituacionMatriculaid' => $idsituacionmatriculas,	
                  'Estudianteid' => $idestudiante,	
                  );
            $matriculaid = $matriculas->insert($data1);// peticion para insertar la matricula en la tabla matricula        
                  if(!empty($matriculaid))
                  {
                    $valor=1; 
                  }
        }
        return json_encode($valor);
              }
   
}