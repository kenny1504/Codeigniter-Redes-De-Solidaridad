<?php namespace App\Controllers;

use App\Models\matriculas;
use App\Models\estudiantes;
use App\Models\personas;
use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

class estudiante extends BaseController
{
	public function index()
	{
        
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION  
        $db = \Config\Database::connect(); // concexion con la basse de datos
        
        $consulta="SELECT e.personasid,e.id,e.CodigoEstudiante,CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre, p.Sexo,p.Direccion,CONCAT(pe.Nombre,' ',pe.Apellido1,' ',pe.Apellido2) as Nombre_tutor,pe.Telefono
        FROM estudiantes as e JOIN personas as p on p.id=e.personasid
        join tutores as t on e.tutorid=t.id join personas as pe on pe.id=t.personasid";

        $consulta1="SELECT t.id,p.Cedula, CONCAT(p.Nombre,' ',p.Apellido1,' ',p.Apellido2) as Nombre, p.Sexo,p.Correo,p.Telefono,o.Nombre AS Oficio
        FROM tutores as t JOIN personas as p on p.id=t.personasid JOIN oficios as o ON o.id=t.Oficiosid";

        if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
	     {
                        $data['Estudiantes'] = $db->query($consulta); //Envia la consulta a la base de datos
                        $data1['Tutores'] = $db->query($consulta1); //Envia la consulta a la base de datos
                        return view('/Estudiante/index.blade.php',$data+$data1);// retorna vista y se envian datos 
              }
             else
             {
                 return view('login.blade.php');
             }

    }
    public function cargar($id) //funcion para recuperar datos del estudiante y el tutor en la tabla detalleAsignatura
	{
         $db = \Config\Database::connect(); // concexion con la basse de datos
   
       $consulta="SELECT e.CodigoEstudiante,p.Nombre,p.Apellido1,p.Apellido2,p.FechaNacimiento,p.Sexo,par.Parentesco,p.Telefono,p.Direccion,
        pe.Cedula,pe.Nombre as Nombret,pe.Apellido1 as apellido1t,pe.Apellido2 as apellido2t,pe.FechaNacimiento as fechat,p.Sexo as sexot,
        pe.Correo as correot,pe.Telefono as telefonot,pe.Direccion as dirrecciont,o.Nombre as oficiot
                FROM estudiantes as e JOIN personas as p on p.id=e.personasid
                join tutores as t on e.tutorid=t.id join personas as pe on pe.id=t.personasid
                join oficios as o on o.id=t.Oficiosid
                JOIN parentescos as par on par.id=e.parentescoid WHERE e.id='".$id."' "; 
 
          $data = $db->query($consulta); //Envia la consulta a la base de datos 
          return json_encode($data->getResultArray());          
    }

    public function agregar() //ingresar un nuevo estudiante
    {
     
        $persona =new personas();
        $estudiante =new estudiantes();
        $db = \Config\Database::connect(); // concexion con la basse de datos

        //Datos a insertar en la tabla estudiante
        $codigo_estudiante=$this->request->getPost('Codigo');
        $tutor_estudiante=$this->request->getPost('tutores');
        $parentesco_estudiante=$this->request->getPost('parent');

        //Datos insertar tabla persona
        $nombre_estudiante=$this->request->getPost('NombreE');
        $Apellido1_estudiante=$this->request->getPost('Apellido1');
        $Apellido2_estudiante=$this->request->getPost('Apellido2');
        $Sexo_estudiante=$this->request->getPost('Sexo');
        $telefono_estudiante=$this->request->getPost('telefono');
        $direccion_estudiante=$this->request->getPost('direccion');
        $nacimiento_estudiante=$this->request->getPost('fechanacient'); 
        
        $buscar= $estudiante->where('CodigoEstudiante',$codigo_estudiante)->find();

        if($buscar==false)//si el estudiante no existe ingresa en tabla persona y tabla estudiate
        {

                $person = array (
                    'Cedula'=> "000-000000-0000P", //valor por defecto, al ser estudiante
                    'Nombre'=> $nombre_estudiante,
                    'Apellido1'=> $Apellido1_estudiante,
                    'Apellido2'=> $Apellido2_estudiante,
                    'Sexo'=> $Sexo_estudiante,
                    'Direccion'=> $direccion_estudiante,
                    'Telefono'=> $telefono_estudiante,
                    'Correo'=> "Estudiante@estudiante.com",//valor por defecto, al ser estudiante
                    'FechaNacimiento'=>  $nacimiento_estudiante //ingresando dato de fecha segun formato de base de datos
                );
                $result = $persona->insert($person);// peticion para insertar una nueva persona
                
                if($result==true) // si ingresa persona entonces ingresa en estudiante
                {
                    $estudiant = array (
                        'personasid'=> $result, //ingresa el id retornado por el insertas persona
                        'CodigoEstudiante'=> $codigo_estudiante,
                        'parentescoid'=> $parentesco_estudiante,
                        'tutorid'=> $tutor_estudiante	
                    );
                    $result_estudi = $estudiante->insert($estudiant);// pedicion para insertar un nuevo estudiante
                }
                $consulta="SELECT p.Telefono FROM tutores as t JOIN personas as p on t.personasid=p.id WHERE t.id=$tutor_estudiante"; //consulta a la base de datos
                $telefono_tutor = $db->query($consulta); //Envia la consulta a la base de datos para conocer el telefono del tutor
                
                foreach ($telefono_tutor->getResultArray() as $telefono) { //recorro el arreglo de la consulta

                        $newdata = array( // asigna los valores del arreglo a la varible de SESSION
                            'Telefono'=> $telefono['Telefono'], //telefono del tutor
                            'id'  => $result_estudi //id estudiante
                        ); 
                }

                return json_encode($newdata); //retorna arreflo con parametros del nuevo estudiante para insertarlos a la tabla
    
        }
        else // si el estudiante ya existe entonces retorna mensaje de error
        {
            return json_encode(0);
        }

    }
    

         
      public function eliminar($id)///eliminar un estudiante
        {

            $valor=0;  $id_persona=0;
            $persona =new personas();
            $estudiante =new estudiantes();
            $matricula = new matriculas();//creacion de instancia matricula para hacer la busqueda en la tabla	

            $buscar = $matricula->where('Estudianteid',$id)->find();//buscar si el id estudiante no existe en la tabla matricula
    
            if($buscar==false)//si no existe en la tabla matricula
            {		
                $buscar_estudiante=  $estudiante->where('id',$id)->find();
                foreach ($buscar_estudiante as $estudiant) { 
                  $id_persona= $estudiant['personasid'];

                }

                $eliminar_estudiante = $estudiante->where('id',$id)->delete();
                $eliminar_persona = $persona->where('id',$id_persona)->delete();
                if(!empty($eliminar_estudiante) &&  !empty($eliminar_persona) )
                {
                    $valor=1;
                }
            }
            return  json_encode($valor);

        }



        public function actualizar($id,$idper) // metodo para actualizar un estudiante
        {
            $persona =new personas();
            $estudiante =new estudiantes();
            $db = \Config\Database::connect(); // conexion con la basse de datos
                  
 
            //Datos a insertar en la tabla estudiante
            $codigo_estudiante=$this->request->getPost('edit_Codigo');
            $tutor_estudiante=$this->request->getPost('edit_tutores');
            $parentesco_estudiante=$this->request->getPost('edit_parent');
    
            //Datos insertar tabla persona
            $nombre_estudiante=$this->request->getPost('edit_NombreE');
            $Apellido1_estudiante=$this->request->getPost('edit_Apellido1');
            $Apellido2_estudiante=$this->request->getPost('edit_Apellido2');
            $Sexo_estudiante=$this->request->getPost('edit_Sexo');
            $telefono_estudiante=$this->request->getPost('edit_telefono');
            $direccion_estudiante=$this->request->getPost('edit_Direccion');
            $nacimiento_estudiante=$this->request->getPost('edit_fechanacient'); 
             
            $buscar= $estudiante->where('CodigoEstudiante',$codigo_estudiante)->find();
    
            if($buscar==false)//si el estudiante no existe ingresa en tabla persona y tabla estudiate
            {
    
                    $person = array (
                        'Cedula'=> "000-000000-0000P", //valor por defecto, al ser estudiante
                        'Nombre'=> $nombre_estudiante,
                        'Apellido1'=> $Apellido1_estudiante,
                        'Apellido2'=> $Apellido2_estudiante,
                        'Sexo'=> $Sexo_estudiante,
                        'Direccion'=> $direccion_estudiante,
                        'Telefono'=> $telefono_estudiante,
                        'Correo'=> "Estudiante@estudiante.com",//valor por defecto, al ser estudiante
                        'FechaNacimiento'=>  $nacimiento_estudiante //ingresando dato de fecha segun formato de base de datos
                    );
                    $result = $persona->update($idper,$person);// peticion para insertar una nueva persona
                    
                    if($result==true) // si ingresa persona entonces ingresa en estudiante
                    {
                        if($codigo_estudiante=="0")
                        {
                            $estudiant = array (
                                'parentescoid'=> $parentesco_estudiante,
                                'tutorid'=> $tutor_estudiante	
                            );
                        }
                        else
                        {
                            $estudiant = array (
                                'CodigoEstudiante'=> $codigo_estudiante,
                                'parentescoid'=> $parentesco_estudiante,
                                'tutorid'=> $tutor_estudiante	
                            );
                        }
                       
                        $result_estudi = $estudiante->update($id,$estudiant);// pedicion para insertar un nuevo estudiante
                    }
                    $consulta="SELECT p.Telefono FROM tutores as t JOIN personas as p on t.personasid=p.id WHERE t.id=$tutor_estudiante"; //consulta a la base de datos
                    $telefono_tutor = $db->query($consulta); //Envia la consulta a la base de datos para conocer el telefono del tutor
                    
                    if($result_estudi==true) // si actualiza el estudiante 
                    {
                        foreach ($telefono_tutor->getResultArray() as $telefono) { //recorro el arreglo de la consulta
    
                            $newdata = array( // asigna los valores del arreglo a la varible de SESSION
                                'Telefono'=> $telefono['Telefono'], //telefono del tutor
                                'id'  => $id //id estudiante
                                
                            ); 
                         }
    
                        return json_encode($newdata); //retorna arreflo con parametros del nuevo estudiante para insertarlos a la tabla
                    }
                  
        
            }
            else // si el estudiante ya existe entonces retorna mensaje de error
            {
                return json_encode(0);
            }
    


        }

        public function cargar_editar($id)
        {
            $db = \Config\Database::connect(); // concexion con la basse de datos
            $consulta=" SELECT e.CodigoEstudiante,p.Nombre,p.Apellido1,p.Apellido2,p.Sexo,p.Telefono,e.tutorid,e.parentescoid,p.Direccion,p.FechaNacimiento 
            FROM estudiantes as e JOIN personas as p on p.id=e.personasid WHERE e.id=$id";
             $data = $db->query($consulta); //Envia la consulta a la base de datos 
             return json_encode($data->getResultArray());      

        }
}
