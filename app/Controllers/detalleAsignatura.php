<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\gradoaasignaturas;
use CodeIgniter\HTTP\Request;

class detalleAsignatura extends BaseController
{
	public function index()
	{ 
		
	}
	
	public function guardar() //funcion para guardar en la tabla detalleAsignatura
	{
        $gradoasignatura = new gradoaasignaturas();
        $idmateria=$this->request->getPost('Asignaturas');   //variable que recive los valores de input idmateria
        $idgrado=$this->request->getPost('Grados');   //variable que recive los valores del idgrado
        $busqueda= $gradoasignatura->where('Gradoid',$idgrado)->where('Asignaturaid',$idmateria)->find();

        if($busqueda!=true) {

            $data = array (
                  'Gradoid' => $idgrado,
                  'Asignaturaid' => $idmateria		
                  );
              $result = $gradoasignatura->insert($data);// peticion para insertar en la tabla detalleAsignatura
            
              if($result!=true)
             {
                   return   json_encode(0); 
             }
             else
             {
                     return   json_encode(1);
             }
        }
        else{

            return   json_encode(-1);

        }
    
       
               
      }
      
      public function eliminar($id) //funcion para guardar en la tabla detalleAsignatura
	{
             $valor=0;
            $detalleasig = new gradoaasignaturas();
		$result = $detalleasig->where('id',$id)->delete();
		if(!empty($result))
		{
			$valor=1;
		}
		return  json_encode($valor);

               
	}
}