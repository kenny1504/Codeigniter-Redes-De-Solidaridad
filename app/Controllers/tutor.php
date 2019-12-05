<?php namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\tutores;
use App\Models\personas;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

class tutor extends BaseController
{
	public function cargar()
	{
	}
	
    public function tutores() //metodo para cargar todos los tutores
    {
        $db = \Config\Database::connect(); // concexion con la basse de datos
        $consulta="SELECT t.id,CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre FROM tutores as t JOIN personas as p on p.id=t.personasid";
       
        $data = $db->query($consulta);//Envia la consulta a la base de datos 
        return json_encode($data->getResultArray());

    }
    public function agregar() //ingresar un nuevo tutor
    {
     
        $persona =new personas();
        $tutor =new tutores();
        $db = \Config\Database::connect(); // concexion con la base de datos

        //Datos insertar tabla persona
        $cedula=$this->request->getPost('Cedulat');
        $nombre=$this->request->getPost('Nombre-tutor');
        $apellido1=$this->request->getPost('apellido1-tutor');
        $apellido2=$this->request->getPost('apellido2-tutor');
        $sexo=$this->request->getPost('sexot');
        $telefono=$this->request->getPost('telefonot');
        $direccion=$this->request->getPost('direcciont');
        $fecha=$this->request->getPost('datepickertutor'); 
        $correo=$this->request->getPost('correot');
        
        $buscar= $persona->where('Cedula',$cedula)->find();

        if($buscar==false)//si la cedula ingresada no existe, se ingresa tutor
        {

                $person = array (
                    'Cedula'=> $cedula,
                    'Nombre'=> $nombre,
                    'Apellido1'=> $apellido1,
                    'Apellido2'=> $apellido2,
                    'Sexo'=> $sexo,
                    'Direccion'=> $direccion,
                    'Telefono'=> $telefono,
                    'Correo'=> $correo,
                    'FechaNacimiento'=>  $fecha //ingresando dato de fecha segun formato de base de datos
                );
                $result = $persona->insert($person);// peticion para insertar una nueva persona
                
                if($result==true) // si ingresa persona entonces ingresa en tutor
                {
                    $oficioid=$this->request->getPost('oficiot');
                    $tut = array (
                        'personasid'=> $result, //ingresa el id retornado por el insertas persona
                        'Oficiosid'=> $oficioid
                    );
                    $result_tutor = $tutor->insert($tut);// pedicion para insertar el nuevo tutor
                    
                }
            
              if($result==true && $result_tutor==true)
              {
                return   json_encode(1);
              }
              else {
                return   json_encode(2);
              }
        }
        else // si la cedula tutor ya existe entonces retorna mensaje de error
        {
            return json_encode(0);
        }

    }
}