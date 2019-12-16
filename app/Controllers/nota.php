<?php namespace App\Controllers;

use App\Models\detallesNota;
use App\Models\notas;
use CodeIgniter\Controller;
use App\Models\ofertas;
use App\Models\UserModel;

class nota extends BaseController
{
	public function index()
	{

        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION  
       

        if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
	     {
                        return view('/Notas/index.blade.php');// retorna vista y se envian datos 
              }
             else
             {
                 return view('login.blade.php');
             }
		
    }
    
    public function cargar($año,$grado,$grupo,$id_detalle_Nota,$id_materia) //carga las notas de los estudiantes
    {

        $db = \Config\Database::connect(); // conexion con la basse de datos
        $notas =new notas();
        
        $busqueda="select * from ofertas as o WHERE (o.FechaOferta=$año and o.Gradoid=$grado and o.Grupoid=$grupo)";
        $result = $db->query($busqueda); //Envia la consulta a la base de datos

        if(!empty($result->getResultArray()))//Si los datos seleccionados son corrrector Entra
        {
            
            //consulta para verificar si existen Notas segun lo seleccionado en los desplegables 
           $busqueda_Notas="select 
           n.id,
           e.CodigoEstudiante,CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre, 
           p.Sexo,
           gra.Grado,
           gru.Grupo,
           asi.Nombre as asignatura,
           n.Nota,
           detN.Descripcion 
           from matriculas as m join estudiantes as e on e.id=m.Estudianteid 
           join personas as p on p.id=e.personasid 
           join ofertas as o on o.id=m.Ofertaid 
           join grupos as gru on gru.id=o.Grupoid 
           join grados as gra on gra.id=o.Gradoid 
           join detallematriculas as detM on detM.Matriculaid=m.id 
           join asignaturas as asi on asi.id=detM.Asignaturaid 
           join notas as n on n.DetalleMatriculaid=detM.id 
           join detallenotas as detN on detN.id=n.DetalleNotaid 
           WHERE (o.FechaOferta=$año and gra.id=$grado and gru.id=$grupo and asi.id=$id_materia and detN.id=$id_detalle_Nota )"; 

           $result2 = $db->query($busqueda_Notas); //Envia la consulta a la base de datos

           if(!empty($result2->getResultArray()))//Si existen notas asignadas entonces retorna datos 
           {
               
               return json_encode($result2->getResultArray()); 
                
           }
           else
            { 
                //Resuperamos los ID de la tabla  detallematriculas
                $busqueda_Detalles_Notas="select det.id from ofertas as o 
                join matriculas as m on m.Ofertaid=o.id 
                join detallematriculas as det on det.Matriculaid=m.id 
                join asignaturas as s on s.id=det.Asignaturaid 
                WHERE (o.FechaOferta=$año and o.Gradoid=$grado and o.Grupoid=$grupo and s.id=$id_materia )";
                
                $result3 = $db->query($busqueda_Detalles_Notas); //Envia la consulta a la base de datos
                
                foreach ($result3->getResultArray() as $id_detalle) {
                    
                    $newdata = array( // arreglo para asignarle la Nota de 0 por defecto al estudiante
                        'Nota'=>0,
                        'DetalleNotaid'=>$id_detalle_Nota,
                        'DetalleMatriculaid' =>  $id_detalle['id']
                    ); 
                        $notas->insert($newdata);// peticion para insertar la oferta en la tabla oferta
                }
                
                $result4 = $db->query($busqueda_Notas); //Envia la consulta a la base de datos para recuperar datos
                return json_encode($result4->getResultArray());
            }
        }
        else
        {
            return json_encode(0);    
        }

    }

    public function Guardar_Notas() //Metodo para guardar y actualizar Notas
    {
        $notas =new notas();
        $Nota=$this->request->getPost('Notas');   //variable que recibe los valores Nota del Estudiante
        $DetalleMatricula=$this->request->getPost('DetalleMatricula');   //variable que recibe los valores ID de la tabla  detallematriculas
        
        $result=0;
        for($i=0; $i < count($Nota); $i++){ //recorremos el arreglo de notas

            $data= array (
                'Nota' => $Nota[$i]	
              );

              $result=$notas->update($DetalleMatricula[$i],$data); //actualizamos Notas
          }
            return json_encode($result); 
    
    }

    public function cargar_detalles()
    {
       $detalles =new detallesNota();
       
       $result= $detalles->findAll();
	   return json_encode($result);
   }	

    
	
}