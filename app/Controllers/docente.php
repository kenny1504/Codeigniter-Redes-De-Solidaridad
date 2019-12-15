<?php namespace App\Controllers;
use App\Models\grados;

use CodeIgniter\Controller;

use App\Models\docentes;
use App\Models\personas;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;


class docente extends BaseController
{
    public function index()
	{
        
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION  
        $db = \Config\Database::connect(); // concexion con la basse de datos
        
        $consulta="SELECT d.Estado, d.id,p.Cedula, CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre, p.Sexo,p.Correo,p.Telefono
        FROM docentes as d JOIN personas as p on p.id=d.personasid ";

        if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
	     {
                        $data['Docentes'] = $db->query($consulta); //Envia la consulta a la base de datos
                        return view('/Docente/index.blade.php',$data);// retorna vista y se envian datos 
              }
             else
             {
                 return view('login.blade.php');
             }

    }
    public function cargar($id) //funcion para recuperar datos del docente y mostrar(ya sea despues de agregar o editar) 
	{
         $db = \Config\Database::connect(); // concexion con la basse de datos
   
       $consulta="SELECT d.id AS idDocente, p.id AS idPersona, p.Cedula,p.Nombre,p.Apellido1,p.Apellido2, p.Sexo,p.Direccion,p.Correo,p.Telefono,p.FechaNacimiento,d.Estado
       FROM docentes as d JOIN personas as p on p.id=d.personasid WHERE d.id=$id"; 
 
          $data = $db->query($consulta); //Envia la consulta a la base de datos 
          return json_encode($data->getResultArray());          
    }
    public function cargardoc()//cargar docentes para oferta
	{
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION  
        $db = \Config\Database::connect(); // concexion con la basse de datos
        $clave=$this->request->getPost('datepickerOferta'); 
        
        $consulta="SELECT docentes.id AS id,CONCAT (personas.Nombre,' ',personas.Apellido1,' ',personas.Apellido2) AS Nombre FROM docentes 
        JOIN personas on personas.id=docentes.personasid WHERE NOT EXISTS(SELECT * FROM ofertas WHERE ofertas.Docenteid=docentes.id AND YEAR(ofertas.FechaOferta)=2019 )and docentes.Estado=1";

 
                        $data = $db->query($consulta); //Envia la consulta a la base de datos     
                        return json_encode($data->getResultArray());// retorna 
    }
    public function cargargrados()
	{
       
            $grados = new grados();
            $result= $grados->findAll();
            return json_encode($result);
        
	   
    }
    
    public function agregar() //ingresar un nuevo docente
    {
     
        $persona =new personas();
        $docente =new docentes();
        $db = \Config\Database::connect(); // concexion con la base de datos

        //Datos a insertar en la tabla docente
        $estado=$this->request->getPost('Estado');


        //Datos insertar tabla persona
        $cedula=$this->request->getPost('Cedula_Docente');
        $nombre=$this->request->getPost('Nombre_Docente');
        $apellido1=$this->request->getPost('Apellido1_Docente');
        $apellido2=$this->request->getPost('Apellido2_Docente');
        $sexo=$this->request->getPost('Sexo_Docente');
        $telefono=$this->request->getPost('Telefono_Docente');
        $direccion=$this->request->getPost('Direccion_Docente');
        $fecha=$this->request->getPost('datepickerDocente'); 
        $correo=$this->request->getPost('Correo_Docente'); 
        
        $buscar= $persona->where('Cedula',$cedula)->find();

        if($buscar==false)//si la cedula ingresada no existe, se ingresa docente
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
                
                if($result==true) // si ingresa persona entonces ingresa en docente
                {
                    $docent = array (
                        'personasid'=> $result, //ingresa el id retornado por el insertas persona
                        'Estado'=> $estado
                    );
                    $result_docente = $docente->insert($docent);// pedicion para insertar el nuevo docente
                    
                }
                    $nuevodata = array( // asigna los valores del arreglo a la varible 
                        'id'  => $result_docente //id docente
                        
                    ); 
            
              return   json_encode($nuevodata);
        }
        else // si el docente ya existe entonces retorna mensaje de error
        {
            return json_encode(0);
        }

    }

    public function eliminar()
	{
        $valor=0;  
        $docentes = new docentes();
		$id=$this->request->getPost('valor_id_docente');//variable que recibe el id del docente a eliminar
		$data = array (
			'Estado' => 0	
		);

		$result = $docentes->update($id,$data);// pedicion para validar el dato
		if($result==true) // si actualiza el estado del docente
		{
			$valor=1;
			return json_encode($valor); //retorna msg con valor true
		}
		else
		{
			
			return json_encode( $valor); // retorna los errores
        }		
    }
    public function actualizar()
	{
        $db = \Config\Database::connect(); // conexion con la basse de datos
        $retorno=0;
        $docentes = new docentes();
        $personas = new personas();
          //varible que recive los valores de input PASSWORD
        $iddoc=$this->request->getPost('iddocente_editar');
        $idper=$this->request->getPost('idpersona_editar');
        $cedula=$this->request->getPost('Cedula_Docente_Editar');   //variable que recibe el valor de cedula docente
        $nombre=$this->request->getPost('Nombre_Docente_Editar');   //variable que recibe el nombre docente
        $apellido1=$this->request->getPost('Apellido1_Docente_Editar');   //variable que recibe el apellido1 docente
        $apellido2=$this->request->getPost('Apellido2_Docente_Editar');   //variable que recibe el apellido2 docente
        $sexo=$this->request->getPost('Sexo_Docente_Editar');   //variable que recibe sexo docente
        $telefono=$this->request->getPost('Telefono_Docente_Editar');   //variable que recibe telefono docente
        $estado=$this->request->getPost('Estado_Editar');       //variable que recibe estado docente
        $correo=$this->request->getPost('Correo_Docente_Editar');   //variable que recibe correo docente
        $direccion=$this->request->getPost('Direccion_Docente_Editar'); //variable que recibe direccion docente
        $fecha=$this->request->getPost('datepickerDocenteEditar');  //variable que recibe fechanacimiento docente

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
        //actualizar en Docente
        $data2 = array (
            'Estado' => $estado
            );    
             
        $result1 = $personas->update($idper,$data1);// pedicion para validar el dato
        $result2 = $docentes->update($iddoc,$data2);// pedicion para validar el dato
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