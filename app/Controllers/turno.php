<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\turnos;
use App\Models\matriculas;

class turno extends BaseController
{
	public function index()
	{ 
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION
      
        if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
		{
			
            $turnos = new turnos();
            $data = [
                'turnos' => $turnos->paginate(10), //retorna los datos de la tabla turnos con su paginacion
                'pager' => $turnos->pager
            ];
            return view('/Turno/index.blade.php',$data);// retorna vista y se envian datos
		}
		else
		{
			return view('login.blade.php');
		}
		
    }
    public function eliminar()
	{
		$valor=0;  
		$id=$this->request->getPost('valor_id_turno');   //varible que recive los valores de input valor_id_turno
		
		$matricula = new matriculas();//creacion de instancia matricula para hacer la busqueda en la tabla		
		$buscar = $matricula->where('Turnoid',$id)->find();//buscar si el Grupoid no existe en la tabla matricula

		if($buscar==false)//si no existe en la tabla matricula
		{		
			$turnos = new turnos();
			$result = $turnos->where('id',$id)->delete();
			if(!empty($result))
			{
				$valor=1;
			}
		}
		return  json_encode($valor);
	}
	public function agregar()
	{
		$turnos = new turnos();
		$nombre=$this->request->getPost('Nombre_turno');   //varible que recive los valores de input Nombre_turno
		
		$data = array (
			'Nombre' => $nombre		
		);
		$result = $turnos->insert($data);// pedicion para insertar nuevo turno
		
		if($result==true) // si actualiza los datos
		{
			$turno = array (
				'Nombre' => $nombre,
				'id' => $result, //cuando se hace una insercion la consulta debuelve el id del dato ingresado
				'msg'=> true	// si el dato es actualizado la variable de retorna TRUE	
			);
			return json_encode($turno); //retorna el arreglo con los valores ingresados
		}
		else
		{
			$errors = $turnos->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}
	
	}
	public function actualizar()
	{
		$turnos = new turnos();
		$id=$this->request->getPost('idturno');   //varible que recive los valores de input PASSWORD
		$nombre=$this->request->getPost('Nombre-Turno');   //varible que recive los valores de input PASSWORD	
		
		$data = array (
			'Nombre' => $nombre		
		);

		$result = $turnos->update($id,$data);// pedicion para validar el dato
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
			$errors = $turnos->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}		
	}
}