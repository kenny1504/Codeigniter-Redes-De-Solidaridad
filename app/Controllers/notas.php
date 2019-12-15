<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ofertas;
use App\Models\UserModel;

class notas extends BaseController
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
    
    public function cargar($año,$grupo,$grado) //carga las notas de los estudiantes
    {

        $db = \Config\Database::connect(); // concexion con la basse de datos
        $ofertas = new ofertas();

        $buscar= $ofertas->where('FechaOferta',$año)
        ->where('Gradoid',$grado)
        ->where('Grupoid',$grupo)
        ->find();

        if($buscar==false)//si el estudiante no existe ingresa en tabla persona y tabla estudiate
        {
            $consulta="SELECT e.id,e.CodigoEstudiante,CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre,gra.Grado,gr.Grupo 
            FROM estudiantes as e JOIN personas as p on p.id=e.personasid 
            JOIN matriculas as m on m.Estudianteid=e.id 
            join ofertas as o on o.id=m.Ofertaid 
            JOIN grupos as gr on gr.id=o.Grupoid 
            join grados as gra on gra.id=o.Gradoid 
            WHERE o.id=1";
            
            $data = $db->query($consulta); //Envia la consulta a la base de datos 
            return json_encode($data->getResultArray());       
        }
        else
        {
            return json_encode(0); 
        }

    }
	
}