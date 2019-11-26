<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\secciones;
use App\Models\ofertas;

class seccion extends BaseController
{
	public function index()
	{ 
		$session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION
      
		if($_SESSION['login_in']==true)if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
		{
			
			$secciones = new secciones();
			$data = [
				'secciones' => $secciones->paginate(10), //retorna los datos de la tabla secciones con su paginacion
				'pager' => $secciones->pager
			];
			return view('/Seccion/index.blade.php',$data);// retorna vista y se envian datos
		}
		else
		{
			return view('login.blade.php');
		}
		
	}
	public function agregar()
	{
		$secciones = new secciones();
		$nombre=$this->request->getPost('Nombre_seccion');   //varible que recive los valores de input Nombre_seccion
		
		$data = array (
			'Codigo' => $nombre		
		);
		$result = $secciones->insert($data);// pedicion para insertar nuevo seccion
		
		if($result==true) // si actualiza los datos
		{
			$seccion = array (
				'Codigo' => $nombre,
				'id' => $result, //cuando se hace una insercion la consulta debuelve el id del dato ingresado
				'msg'=> true	// si el dato es actualizado la variable de retorna TRUE	
			);
			return json_encode($seccion); //retorna el arreglo con los valores ingresados
		}
		else
		{
			$errors = $secciones->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}
	
	}
	public function actualizar()
	{
		$secciones = new secciones();
		$id=$this->request->getPost('idseccion');   //varible que recive los valores de input PASSWORD
		$nombre=$this->request->getPost('Nombre-Seccion');   //varible que recive los valores de input PASSWORD	
		
		$data = array (
			'Codigo' => $nombre		
		);

		$result = $secciones->update($id,$data);// pedicion para validar el dato
		if($result==true) // si actualiza los datos
		{
			$datos = array (
				'id'=>$id,
				'Codigo' => $nombre,
				'msg'=> true	// si el dato es actualizado la variable de retorna TRUE	
			);
			return json_encode($datos); //retorna el arreglo con los nuevos valores
		}
		else
		{
			$errors = $secciones->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}		
	}
	public function eliminar()
	{
		$valor=0;  
		$id=$this->request->getPost('valor_id_seccion');   //varible que recive los valores de input valor_id_seccion
		$oferta = new ofertas();//creacion de instancia oferta para hacer la busqueda en la tabla		
		$buscar = $oferta->where('Seccionid',$id)->find();//buscar si el Grupoid no existe en la tabla oferta

		if($buscar==false)//si no existe en la tabla oferta
		{		
			$secciones = new secciones();
			$result = $secciones->where('id',$id)->delete();
			if(!empty($result))
			{
				$valor=1;
			}
		}
		return  json_encode($valor);
	}
}