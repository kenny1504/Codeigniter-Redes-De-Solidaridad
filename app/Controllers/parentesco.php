<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\parentescos;
use App\Models\estudiantes;

class parentesco extends BaseController
{
	public function index()
	{ 
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION
      
		if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
		{
			
            $parentescos = new parentescos();
            $data = [
                'parentescos' => $parentescos->paginate(12), //retorna los datos de la tabla parentescos con su paginacion
                'pager' => $parentescos->pager
            ];
            return view('/Parentesco/index.blade.php',$data);// retorna vista y se envian datos
		}
		else
		{
			return view('login.blade.php');
		}
		
    }
    public function eliminar()
	{
		$valor=0;
		$id=$this->request->getPost('valor_id_parentesco');   //varible que recive los valores de input valor_id_parentesco
		$estudiante = new estudiantes();//creacion de instancia estudiante para hacer la busqueda en la tabla		
		$buscar = $estudiante->where('parentescoid',$id)->find();//buscar si el Grupoid no existe en la tabla estudiante

		if($buscar==false)//si no existe en la tabla estudiante
		{		
			$parentescos = new parentescos();
		$result = $parentescos->where('id',$id)->delete();
		if(!empty($result))
		{
			$valor=1;
		}
		}
		return  json_encode($valor);
	}

	public function actualizar()
	{
		$parentescos = new parentescos();
		$id=$this->request->getPost('idparentesco');   //varible que recive los valores de input PASSWORD
		$nombre=$this->request->getPost('Nombre-Parentesco');   //varible que recive los valores de input PASSWORD	
		
		$data = array (
			'Parentesco' => $nombre		
		);

		$result = $parentescos->update($id,$data);// pedicion para validar el dato
		if($result==true) // si actualiza los datos
		{
			$datos = array (
				'id'=>$id,
				'Parentesco' => $nombre,
				'msg'=> true	// si el dato es actualizado la variable de retorna TRUE	
			);
			return json_encode($datos); //retorna el arreglo con los nuevos valores
		}
		else
		{
			$errors = $parentescos->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}		
    }
    
	public function agregar()
	{
		$parentescos = new parentescos();
		$nombre=$this->request->getPost('Nombre_parentesco');   //varible que recive los valores de input Nombre_parentesco
		
		$data = array (
			'Parentesco' => $nombre		
		);
		$result = $parentescos->insert($data);// pedicion para insertar nuevo parentesco
		
		if($result==true) // si actualiza los datos
		{
			$parentesco = array (
				'Parentesco' => $nombre,
				'id' => $result, //cuando se hace una insercion la consulta debuelve el id del dato ingresado
				'msg'=> true	// si el dato es actualizado la variable de retorna TRUE	
			);
			return json_encode($parentesco); //retorna el arreglo con los valores ingresados
		}
		else
		{
			$errors = $parentescos->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}
	
	}
}