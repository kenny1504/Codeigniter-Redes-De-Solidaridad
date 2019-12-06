<?php namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\tutores;
use App\Models\personas;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;
use App\Models\estudiantes;

class tutor extends BaseController
{

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
                $nuevodata = array( // asigna los valores del arreglo a la varible 
                    'id'  => $result_tutor //id tutor
                    
                ); 
                return   json_encode($nuevodata);

        }
        else // si la cedula tutor ya existe entonces retorna mensaje de error
        {
            return json_encode(0);
        }

    }
    public function eliminar()///eliminar un tutor
        {

            $valor=0;  $id_persona=0;
            $persona =new personas();
            $tutor =new tutores();
            $estudiante = new estudiantes();//creacion de instancia estudiante para hacer la busqueda en la tabla	
            $id=$this->request->getPost('valor_id_tutor');//variable que recibe el id del tutor a eliminar
            $buscar = $estudiante->where('tutorid',$id)->find();//buscar si el id tutor no existe en la tabla estudiante
    
            if($buscar==false)//si no existe en la tabla matricula
            {		
                $buscar_tutor=  $tutor->where('id',$id)->find();
                foreach ($buscar_tutor as $tut) { 
                  $id_persona= $tut['personasid'];

                }

                $eliminar_tutor = $tutor->where('id',$id)->delete();
                $eliminar_persona = $persona->where('id',$id_persona)->delete();
                if(!empty($eliminar_tutor) &&  !empty($eliminar_persona) )
                {
                    $valor=1;
                }
            }
            return  json_encode($valor);

        }
        public function cargar($id) //funcion para recuperar datos del docente y mostrar(ya sea despues de agregar o editar) 
	{
         $db = \Config\Database::connect(); // concexion con la basse de datos
   
       $consulta="SELECT t.id  AS idTutor, p.id AS idPersona,p.Cedula,p.Nombre,p.Apellido1,p.Apellido2, p.Sexo,p.Direccion,p.Correo,p.Telefono,p.FechaNacimiento,o.Nombre AS Oficio ,t.Oficiosid AS idOficio
       FROM personas As p JOIN tutores As t ON p.id=t.personasid JOIN oficios AS o ON o.id=t.Oficiosid WHERE t.id=$id"; 
 
          $data = $db->query($consulta); //Envia la consulta a la base de datos 
          return json_encode($data->getResultArray());          
    }
    public function actualizar()
	{
        $db = \Config\Database::connect(); // conexion con la basse de datos
        $retorno=0;
        $tutores = new tutores();
        $personas = new personas();
          //varible que recive los valores de input PASSWORD
        $idtut=$this->request->getPost('idtutor_editar');
        $idper=$this->request->getPost('idpersona_tutor');
        $cedula=$this->request->getPost('Cedula_Tutor_Editar');   //variable que recibe el valor de cedula docente
        $nombre=$this->request->getPost('Nombre_Tutor_Editar');   //variable que recibe el nombre docente
        $apellido1=$this->request->getPost('Apellido1_Tutor_Editar');   //variable que recibe el apellido1 docente
        $apellido2=$this->request->getPost('Apellido2_Tutor_Editar');   //variable que recibe el apellido2 docente
        $sexo=$this->request->getPost('Sexo_Tutor_Editar');   //variable que recibe sexo docente
        $telefono=$this->request->getPost('Telefono_Tutor_Editar');   //variable que recibe telefono docente
        $oficioid=$this->request->getPost('Oficio_Editar1');       //variable que recibe estado docente
        $correo=$this->request->getPost('Correo_Tutor_Editar');   //variable que recibe correo docente
        $direccion=$this->request->getPost('Direccion_Tutor_Editar'); //variable que recibe direccion docente
        $fecha=$this->request->getPost('datepickerTutorEditar');  //variable que recibe fechanacimiento docente

        //actualizar en Persona
		$data1 = array (
            'Cedula' => $cedula,
            'Nombre' => $nombre,		
            'Apellido1' => $apellido1,	
            'Apellido2' => $apellido2,	
            'Sexo' => $sexo,	
            'Direccion' => $direccion,	
            'Correo' => $correo,	
            'Telefono' => $telefono,
            'FechaNacimiento' => $fecha
            );
        //actualizar en Tutor
        $data2 = array (
            'Oficiosid' => $oficioid
            );    
             
        $result1 = $personas->update($idper,$data1);// pedicion para validar el dato
        $result2 = $tutores->update($idtut,$data2);// pedicion para validar el dato
		if($result1==true && $result2==true) // si actualiza los datos
		{
            
            $retorno=1;
            return json_encode($retorno);
		}
		else
		{
			return json_encode($retorno); // retorna los errores
		}		
	}
}