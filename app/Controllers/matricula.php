<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;
use App\Models\situacionmatriculas;
use App\Models\matriculas;
use App\Models\detallematriculas;

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
		$db = \Config\Database::connect(); // conexion con la basse de datos
  
		////////////// CONSULTA A ENVIAR A MYSQL
		  $consulta= "SELECT asignaturas.id,asignaturas.Nombre FROM ofertas JOIN grados ON  ofertas.Gradoid=grados.id  JOIN gradoaasignaturas ON grados.id=gradoaasignaturas.Gradoid 
          JOIN asignaturas ON asignaturas.id=gradoaasignaturas.Asignaturaid WHERE ofertas.id=$id";
		   
		   $result=$db->query($consulta); //Envia la consulta a la base de datos
      if($result==true){
		
		return json_encode($result->getResultArray());

	  }
		else{
     
			return json_encode(false);
	 }
		   
  }
  
  public function guardar() //funcion para guardar en la tabla matricula
	{
        $db = \Config\Database::connect(); // concexion con la basse de datos
        $valor=0;  
          $matriculas = new matriculas();
          $idsituacionmatriculas=$this->request->getPost('Situacion_Matricula');
          $idfecha=$this->request->getPost('datepickerFechaMatricula');   //variable que recibe los valores del fecha matricula
          $idoferta=$this->request->getPost('Oferta_M');   //variable que recibe el id de la oferta seleccionada        
          $idturno=$this->request->getPost('Turno');   //variable que recibe los valores del turno   
          $idestudiante=$this->request->getPost('idestudiante_M');   //variable que recibe los valores del idestudiante
          $anio=$this->request->getPost('datepickerMatricula');


////////////// CONSULTA A ENVIAR A MYSQL
        $consulta_M="SELECT matriculas.Estudianteid FROM  ofertas JOIN matriculas ON ofertas.id=matriculas.Ofertaid JOIN estudiantes ON matriculas.Estudianteid=estudiantes.id 
        WHERE matriculas.Estudianteid=$idestudiante AND ofertas.FechaOferta=$anio";
   
        $result2=$db->query($consulta_M); //Envia la consulta a la base de datos

        if(empty($result2->getResultArray()))//si el estudiante no ha sido matriculado
        {
          $data1 = array (
            'Fecha' => $idfecha,
            'Ofertaid' => $idoferta,		
            'Turnoid' => $idturno,	
            'SituacionMatriculaid' => $idsituacionmatriculas,	
            'Estudianteid' => $idestudiante,	
            );
            $matriculaid = $matriculas->insert($data1);// peticion para insertar la matricula en la tabla matricula   
      
            if($matriculaid==true)
            {
              $detallematriculas= new detallematriculas();
              $idasignatura_M=$this->request->getPost('MateriasM');

              for($i=0; $i < count($idasignatura_M); $i++){

                $data2 = array (
                  'Asignaturaid' => $idasignatura_M[$i],
                  'Matriculaid' => $matriculaid,		
                  );
                  $detallematriculasid = $detallematriculas->insert($data2);//peticion para insertar en detalleMatricula
              }
              if(!empty($detallematriculasid))
              {
                $valor=1; 
              }
            }
        }      
        return json_encode($valor);
  }

  public function cargarsituacion_matricula()//listar situacion matricula
	{
	   $situacionmatriculas = new situacionmatriculas();
       $result= $situacionmatriculas->findAll();
	   return json_encode($result);
  }  
  public function recuperar_Matricula($id_estudiante,$anio)
  {
      $db = \Config\Database::connect(); // concexion con la basse de datos
      $consulta3="SELECT m.id,m.Ofertaid,m.Turnoid,m.SituacionMatriculaid,m.Estudianteid, CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as NombreD ,gr.Grupo,g.Grado,s.Codigo Seccion FROM matriculas as m JOIN ofertas ON ofertas.id=m.Ofertaid JOIN docentes ON docentes.id=ofertas.Docenteid JOIN personas as p on p.id=docentes.personasid JOIN grupos as gr ON gr.id=ofertas.Grupoid JOIN grados AS g ON g.id=ofertas.Gradoid JOIN secciones as s ON s.id=ofertas.Seccionid
      WHERE m.Estudianteid=$id_estudiante AND ofertas.FechaOferta=$anio";
      $resulto2=$db->query($consulta3); //Envia la consulta a la base de datos
      if(!empty($resulto2->getResultArray()))
      {
        return json_encode($resulto2->getResultArray());
      }
  }
}
