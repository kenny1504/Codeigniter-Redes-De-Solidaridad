<?php namespace App\Controllers;

use App\Models\funcionesdeacceso;
use CodeIgniter\Controller;
use App\Models\usuarios;
class usuario extends BaseController
{

   public function autenticacion() //validacion de inicio de sesion
	{  
       
      $db = \Config\Database::connect(); // concexion con la basse de datos
      $valor=-1; //varible de contro (0=denegado 1=aceptado)
      $nombre=$this->request->getPost('username');  //varible que recive los valores de input USERNAME
      $clave=$this->request->getPost('password');   //varible que recive los valores de input PASSWORD

      ////////////// CONSULTA A ENVIAR A MYSQL
		$consulta= "SELECT Usuarios.ClaveDeUsuario, Usuarios.NombreDeUsuario, Usuarios.Nombre, Usuarios.Cedula, FuncionesDeAcceso.Descripcion, FuncionesAsignada.FechaDeVencimiento FROM FuncionesAsignada 
		INNER JOIN FuncionesDeAcceso ON FuncionesAsignada.Id_FuncionAcceso = FuncionesDeAcceso.Id_FuncionAcceso 
		INNER JOIN Usuarios ON FuncionesAsignada.Id_Usuarios = Usuarios.Id_Usuarios WHERE (Usuarios.ClaveDeUsuario ='".$clave."' && Usuarios.NombreDeUsuario = '".$nombre."')";
         
         $result = $db->query($consulta); //Envia la consulta a la base de datos
        
         $session = \Config\Services::session();    // uso de varibles de session
         $session->start();// Inicio de varibles SESSION
      
         if(!empty($result->getResultArray())) // si el arreglo no esta vacio entra y retorna el valor 1 
         {
                  
                  foreach ($result->getResultArray() as $users) { // recorre arreglo para asignar valores a varible de session
                  
                     $fechaUser=$users['FechaDeVencimiento']; //captura fecha del usuario que intenta ingresar
                     $anio=$fechaUser[0].$fechaUser[1].$fechaUser[2].$fechaUser[3]; // variable que guarda año
                     $mes=$fechaUser[5].$fechaUser[6]; // variable que guarda mes
                     $dia=$fechaUser[8].$fechaUser[9];// variable que guarda dia
                        if(date("Y")<=$anio){
                              
                              if(date("m")<=$mes){ // si la fecha No es valida retorna 0 
                                 
                                 if(date("d")>$dia)
                                 {
                                    $newdata = array( // asigna los valores del arreglo a la varible de SESSION
                                       'NombreDeUsuario'=> $users['NombreDeUsuario'],
                                       'Nombre'  => $users['Nombre'],
                                       'Cedula'     => $users['Cedula'],
                                       'Descripcion'     => $users['Descripcion'],
                                       'FechaDeVencimiento'     => $users['FechaDeVencimiento'],
                                       'login_in' =>  TRUE
                                    ); 
                                    $session->set($newdata); //Guarda valores en la variable SESSION 
                                 
                                    $valor=1; // retorna 1 si el usuario existe y esta con la fecha de vencimiento valida
                                 }
                                 else
                                 {                                
                                  $valor=0;
                                 }
                              }   
                              else{ // de lo contrario retorna 1 para muestra ventana Inicio
                                 $valor=0;
                                 }           
                           }
                           else
                           {
                              $valor=0;
                           }
                                                  
                               
               } //foreach  
        }// primer if 
         return json_encode($valor);
}
   
   public function index() //
	{ 
      $session = \Config\Services::session();    // instancia de la libreria SESSION
      $session->start(); // Inicio de varibles SESSION
      $db = \Config\Database::connect(); // concexion con la basse de datos

     $consulta="SELECT funcionesasignada.Id, usuarios.Id_Usuarios, Usuarios.ClaveDeUsuario, Usuarios.NombreDeUsuario, Usuarios.Nombre, Usuarios.Cedula, FuncionesDeAcceso.Descripcion, FuncionesAsignada.FechaDeVencimiento 
     FROM FuncionesAsignada INNER JOIN FuncionesDeAcceso ON FuncionesAsignada.Id_FuncionAcceso = FuncionesDeAcceso.Id_FuncionAcceso INNER JOIN Usuarios ON FuncionesAsignada.Id_Usuarios = Usuarios.Id_Usuarios";
           
    if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
		  {
            $data['usuarios'] = $db->query($consulta); //Envia la consulta a la base de datos
             
            return view('/Usuario/index.blade.php',$data);// retorna vista y se envian datos 
        }
      else{
         return view('login.blade.php');
          } 
   }


   
   public function agregar() //
	{       
   
      $usuario= new usuarios();
      
      $nombre=$this->request->getPost('Nombre');   //varible que recive los valores de input NOMBRE
		
		$data = array (
			'Nombre' => $nombre		
		);
		$result = $usuario->insert($data);// pedicion para insertar nueva asignatura
		
		if($result==true) // si actualiza los datos
		{
			$materia = array (
				'Nombre' => $nombre,
				'id' => $result, //cuando se hace una insercion la consulta debuelve el id del dato ingresado
				'msg'=> true	// si el dato es actualizado la variable de retorna TRUE	
			);
			return json_encode($materia); //retorna el arreglo con los valores ingresados
		}
		else
		{
			$errors = $usuario->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}


   }
   
   public function Cargar_Roles()
   {
      $roles = new funcionesdeacceso();
      $result= $roles->findAll();
     return json_encode($result);

   }
}
