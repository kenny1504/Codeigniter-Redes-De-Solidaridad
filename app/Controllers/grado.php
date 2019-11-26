<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\grados;
use App\Models\gradoaasignaturas;
use App\Models\ofertas;

class grado extends BaseController
{
	public function index()
	{ 
		$session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION  
		if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
		{		
			$grados = new grados();
			$data = [
				'grados' => $grados->paginate(10), //retorna los datos de la tabla grados() con su paginacion
				'pager' => $grados->pager
			];
			return view('/Grado/index.blade.php',$data);// retorna vista y se envian datos
		}
		else
		{
			return view('login.blade.php');
		}
		
	}
	public function eliminar()
	{
		$valor=0;  
		$id=$this->request->getPost('valor_id_grado');//variable que recibe el id de grado a eliminar
		$gradoasignatura = new gradoaasignaturas();//creacion de instancia gradoasignatura para hacer la busqueda en la tabla	
		$oferta = new ofertas();//creacion de instancia ofertas para hacer la busqueda en la tabla	
		$buscar = $gradoasignatura->where('Gradoid',$id)->find();//buscar si el Gradoid no existe en la tabla gradoasignatura
		$buscar1 = $oferta->where('Gradoid',$id)->find();//buscar si el Gradoid no existe en la tabla ofertas

		if($buscar==false && $buscar1==false)//si no existe en la tabla gradoasignatura y oferta
		{		
			$grados = new grados();//creacion de instancia grados	
			$result = $grados->where('id',$id)->delete();//eliminar grado
			if(!empty($result))
				{
					$valor=1;//retornamos 1 para verificar que a sido eliminado
				}
		}
		else if($buscar==false && $buscar1==true)
		{
			$valor=2;//retornamos 2, si solo es encontrado en la oferta
		}
		else if($buscar==true && $buscar1==false)
		{
			$valor=3;//retornamos 2, si solo se le han asignado materias
		}
		return  json_encode($valor);
	}
	
	public function cargargrados()
	{
	   $grados = new grados();
       $result= $grados->findAll();
	   return json_encode($result);
	}
	public function agregar()
	{
		$grados = new grados();
		$nombre=$this->request->getPost('Nombre_grado');   //varible que recive los valores de input NOMBRE
		
		$data = array (
			'Grado' => $nombre		
		);
		$result = $grados->insert($data);// pedicion para insertar nuevo grado
		
		if($result==true) // si actualiza los datos
		{
			$grado = array (
				'Grado' => $nombre,
				'id' => $result, //cuando se hace una insercion la consulta debuelve el id del dato ingresado
				'msg'=> true	// si el dato es actualizado la variable de retorna TRUE	
			);
			return json_encode($grado); //retorna el arreglo con los valores ingresados
		}
		else
		{
			$errors = $grados->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}
	
	}
	public function actualizar()
	{
		$grados = new grados();
		$id=$this->request->getPost('idgrado');   //varible que recive los valores de input PASSWORD
		$nombre=$this->request->getPost('Nombre-Grado');   //varible que recive los valores de input PASSWORD	
		
		$data = array (
			'Grado' => $nombre		
		);

		$result = $grados->update($id,$data);// pedicion para validar el dato
		if($result==true) // si actualiza los datos
		{
			$datos = array (
				'id'=>$id,
				'Grado' => $nombre,
				'msg'=> true	// si el dato es actualizado la variable de retorna TRUE	
			);
			return json_encode($datos); //retorna el arreglo con los nuevos valores
		}
		else
		{
			$errors = $grados->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}		
	}
}