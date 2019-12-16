<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\asignaturas;
use App\Models\gradoaasignaturas;
use Tests\Support\Models\ValidErrorsModel;

class asignatura extends BaseController
{
	public function index()
	{ 
		// echo "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y");
		$session = \Config\Services::session();    // uso de varibles de session
        $session->start();
	
		if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
		{			
			$asignaturas = new asignaturas();
			$data = [
				'asignaturas' => $asignaturas->paginate(12), //retorna los datos de la tabla asignaturas con su paginacion
				'pager' => $asignaturas->pager
			];
			return view('/Materia/index.blade.php',$data);// retorna vista y se envian datos 
		}
		else
		{
			return view('login.blade.php');
		}
	}
	
	
	public function eliminar1()
	{
        $valor=0; 
		$asignaturas = new asignaturas();
        $gradoasignatura= new gradoaasignaturas(); // instancia de la tabla detalle 

		$id=$this->request->getPost('id_Asignatura');   //varible que recive los valores de input ID_MATERIA
		$busqueda= $gradoasignatura->where('Asignaturaid',$id)->find();
			
		//validacion para verificar si la materia aun no ha sido asignada a ningun grado
		   if($busqueda!=false)
			{
				$valor=-1;
				//return  ($valor);
			}
			else
			{
				$result = $asignaturas->where('id',$id)->delete();
				if(!empty($result))
				{
					$valor=1;
				}
				//eturn  ($valor);
			}
			return  json_encode($valor);
	}


	public function actualizar()
	{
		$asignaturas = new asignaturas();
		$id=$this->request->getPost('idmateria');   //varible que recive los valores de input PASSWORD
		$nombre=$this->request->getPost('Nombre-Materia');   //varible que recive los valores de input PASSWORD	
		
		$data = array (
			'Nombre' => $nombre		
		);

		$result = $asignaturas->update($id,$data);// pedicion para validar el dato
		if($result==true) // si actualiza los datos
		{
			$datos = array (
				'id'=>$id,
				'Nombre' => $nombre,
				'msg'=> true	// si el dato es actualizado la variable de retorna TRUE	
			);
			return json_encode($datos); //retorna el arreglo con los nuevos valores
		}
		else
		{
			$errors = $asignaturas->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}

		
	}
	public function agregar()
	{
		$asignaturas = new asignaturas();
		$nombre=$this->request->getPost('Nombre');   //varible que recive los valores de input NOMBRE
		
		$data = array (
			'Nombre' => $nombre		
		);
		$result = $asignaturas->insert($data);// pedicion para insertar nueva asignatura
		
		if($result==true) // si actualiza los datos
		{
			$materia = array (
				'Nombre' => $nombre,
				'id' => $result, //cuando se hace una insercion la consulta debuelve el id del dato ingresado
				'msg'=> true	// si el dato es actualizado la variable de retorna TRUE	
			);
			return json_encode($materia); //retorna el arreglo con los valores ingresados
		}
		else
		{
			$errors = $asignaturas->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}
	
	}

	public function cargarmaterias()
	{

	   $asignaturas = new asignaturas();
       $result= $asignaturas->findAll();
	   return json_encode($result);
	}

	public function cargarmaterias_grado($id)
	{
		$db = \Config\Database::connect(); // concexion con la basse de datos
  
		////////////// CONSULTA A ENVIAR A MYSQL
		  $consulta= "SELECT asignaturas.Id,asignaturas.Nombre FROM asignaturas INNER JOIN gradoaasignaturas ON asignaturas.Id = gradoaasignaturas.Asignaturaid
		  WHERE(gradoaasignaturas.Gradoid =".$id.")";
		   
		   $result=$db->query($consulta); //Envia la consulta a la base de datos
      if($result==true){
		
		return json_encode($result->getResultArray());

	  }
		else{
     
			return json_encode(false);
	 }
		   
	}

	//--------------------------------------------------------------------

}
