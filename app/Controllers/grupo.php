<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\grupos;
use App\Models\ofertas;

class grupo extends BaseController
{
	public function index()
	{ 
		$session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION
      
		if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in'])) //si no existe una sesion No ingresa
		{
			
			$grupos = new grupos();
			$data = [
				'grupos' => $grupos->paginate(10), //retorna los datos de la tabla grupos con su paginacion
				'pager' => $grupos->pager
			];
			return view('/Grupo/index.blade.php',$data);// retorna vista y se envian datos
		}
		else
		{
			return view('login.blade.php');
		}
		
	}
	public function agregar()
	{
		$grupos = new grupos();
		$nombre=$this->request->getPost('Nombre_grupo');   //varible que recive los valores de input Nombre_grupo
		
		$data = array (
			'Grupo' => $nombre		
		);
		$result = $grupos->insert($data);// pedicion para insertar nuevo grupo
		
		if($result==true) // si actualiza los datos
		{
			$grupo = array (
				'Grupo' => $nombre,
				'id' => $result, //cuando se hace una insercion la consulta debuelve el id del dato ingresado
				'msg'=> true	// si el dato es actualizado la variable de retorna TRUE	
			);
			return json_encode($grupo); //retorna el arreglo con los valores ingresados
		}
		else
		{
			$errors = $grupos->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}
	
	}
	public function actualizar()
	{
		$grupos = new grupos();
		$id=$this->request->getPost('idgrupo');   //varible que recive los valores de input PASSWORD
		$nombre=$this->request->getPost('Nombre-Grupo');   //varible que recive los valores de input PASSWORD	
		
		$data = array (
			'Grupo' => $nombre		
		);

		$result = $grupos->update($id,$data);// pedicion para validar el dato
		if($result==true) // si actualiza los datos
		{
			$datos = array (
				'id'=>$id,
				'Grupo' => $nombre,
				'msg'=> true	// si el dato es actualizado la variable de retorna TRUE	
			);
			return json_encode($datos); //retorna el arreglo con los nuevos valores
		}
		else
		{
			$errors = $grupos->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}		
	}
	public function eliminar()
	{
		$valor=0;  
		$id=$this->request->getPost('valor_id_grupo');//variable que recibe el id de grupo a eliminar
		$oferta = new ofertas();//creacion de instancia oferta para hacer la busqueda en la tabla		
		$buscar = $oferta->where('Grupoid',$id)->find();//buscar si el Grupoid no existe en la tabla oferta

		if($buscar==false)//si no existe en la tabla oferta
		{		
			$grupos = new grupos();
			$result = $grupos->where('id',$id)->delete();
			if(!empty($result))
			{
				$valor=1;
			}
		}
		return  json_encode($valor);
	}
}