<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ofertas;
use App\Models\matriculas;
use CodeIgniter\HTTP\Request;

class oferta extends BaseController
{
    public function index() //
	{ 
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION
        $db = \Config\Database::connect(); // concexion con la basse de datos
  
     $consulta="SELECT ofertas.id, ofertas.Descripcion,ofertas.FechaOferta,secciones.Codigo,grupos.Grupo,grados.Grado, CONCAT (personas.Nombre,' ',personas.Apellido1,' ',personas.Apellido2) AS Nombre_Docente
     FROM grupos INNER JOIN ofertas ON grupos.id = ofertas.Grupoid INNER JOIN grados ON grados.id=ofertas.Gradoid
     INNER JOIN secciones on secciones.id=ofertas.Seccionid INNER JOIN docentes on docentes.id=ofertas.Docenteid
     INNER JOIN personas on personas.id=docentes.personasid";
           
    if(isset($_SESSION['login_in']) && !empty($_SESSION['login_in']) && $_SESSION['login_in']==true)  //si no existe una sesion No ingresa
		  {
            $data['ofertas'] = $db->query($consulta); //Envia la consulta a la base de datos
             
            return view('/Oferta/index.blade.php',$data);// retorna vista y se envian datos 
        }
      else{
         return view('login.blade.php');
          } 
  }
    public function guardar() //funcion para guardar en la tabla oferta
	{
        $session = \Config\Services::session();    // instancia de la libreria SESSION
        $session->start(); // Inicio de varibles SESSION
        $db = \Config\Database::connect(); // concexion con la basse de datos


        $ofertas = new ofertas();
        $iddescripcion=$this->request->getPost('Descripcion-Oferta');   //variable que recibe los valores del iddescripcion
        $idfecha=$this->request->getPost('datepickerOferta');   //variable que recibe la fecha del datepicker
        $iddocente=$this->request->getPost('Docente');   //variable que recibe los valores del iddocente
        $idseccion=$this->request->getPost('Seccion');   //variable que recibe los valores del idseccion
        $idgrado=$this->request->getPost('Grado');   //variable que recibe los valores del idgrado
        $idgrupo=$this->request->getPost('Grupo');   //variable que recibe los valores del idgrupo


            $data = array (
                  'Descripcion' => $iddescripcion,
                  'FechaOferta' => $idfecha,		
                  'Seccionid' => $idseccion,	
                  'Gradoid' => $idgrado,	
                  'Grupoid' => $idgrupo,	
                  'Docenteid' => $iddocente
                  );
                $resultado = $ofertas->insert($data);// peticion para insertar la oferta en la tabla oferta

              if($resultado==true)
              {
                  $consulta="SELECT ofertas.id AS idOferta,ofertas.Descripcion,ofertas.FechaOferta,CONCAT (personas.Nombre,' ',personas.Apellido1,' ',personas.Apellido2) AS Nombre, grados.Grado, grupos.Grupo,secciones.Codigo FROM docentes 
                  JOIN personas on personas.id=docentes.personasid JOIN ofertas on ofertas.Docenteid=docentes.id JOIN grupos ON
                  grupos.id=ofertas.Grupoid JOIN grados ON grados.id=ofertas.Gradoid JOIN secciones ON secciones.id
                  =ofertas.Seccionid WHERE ofertas.id=$resultado";
                  $oferta = $db->query($consulta); //Envia la consulta a la base de datos
                  return   json_encode($oferta->getResultArray());
              }
              else
              {
                  $errors = $ofertas->errors(); //recuperar errores de validacion
                  return json_encode( $errors); // retorna los errores
              }              
    }
    public function eliminar()
	{
		$valor=0;  
		$id=$this->request->getPost('valor_id_oferta');//variable que recibe el id de la oferta a eliminar
		$matricula = new matriculas();//creacion de instancia matricula para hacer la busqueda en la tabla		
		$buscar = $matricula->where('Ofertaid',$id)->find();//buscar si la Ofertaid no existe en la tabla matricula

		if($buscar==false)//si no existe en la tabla matricula
		{		
			$ofertas = new ofertas();//creacion de instancia ofertas	
			$result = $ofertas->where('id',$id)->delete();//eliminar grado
			if(!empty($result))
				{
					$valor=1;//retornamos 1 para verificar que a sido eliminado
				}
		}
		return  json_encode($valor);
    }
    public function cargar($ide)
    {
        $db = \Config\Database::connect(); // concexion con la basse de datos

        $idoferta=$this->request->getPost("data-id");

        $carga="SELECT ofertas.id AS idOferta,ofertas.Descripcion,ofertas.FechaOferta,ofertas.Seccionid AS Seccion,ofertas.Gradoid AS Grado,ofertas.Grupoid AS Grupo,ofertas.Docenteid AS Docente FROM docentes 
        JOIN personas on personas.id=docentes.personasid JOIN ofertas on ofertas.Docenteid=docentes.id JOIN grupos ON
        grupos.id=ofertas.Grupoid JOIN grados ON grados.id=ofertas.Gradoid JOIN secciones ON secciones.id
        =ofertas.Seccionid WHERE ofertas.id=$ide";
                  $encontrada = $db->query($carga); //Envia la consulta a la base de datos
                  return   json_encode($encontrada->getResultArray());

    }
    public function actualizar()
	{

        
        $db = \Config\Database::connect(); // concexion con la basse de datos

        $ofertas = new ofertas();
		  //varible que recive los valores de input PASSWORD
        $descripcion=$this->request->getPost('Descripcion_Oferta1');   //variable que recibe los valores del iddescripcion
        $idfecha=$this->request->getPost('datepickerOfertaEditar');   //variable que recibe la fecha del datepicker
        $iddocente=$this->request->getPost('Docente1');   //variable que recibe los valores del iddocente
        $idseccion=$this->request->getPost('Seccion1');   //variable que recibe los valores del idseccion
        $idgrado=$this->request->getPost('Grado1');   //variable que recibe los valores del idgrado
        $idgrupo=$this->request->getPost('Grupo1');   //variable que recibe los valores del idgrupo


		$dat = array (
            'Descripcion' => $descripcion,
            'FechaOferta' => $idfecha,		
            'Seccionid' => $idseccion,	
            'Gradoid' => $idgrado,	
            'Grupoid' => $idgrupo,	
            'Docenteid' => $iddocente
            );
            $id=$this->request->getPost('idoferta'); 
		$result = $ofertas->update($id,$dat);// pedicion para validar el dato
		if($result==true) // si actualiza los datos
		{
			$consulta1="SELECT ofertas.id AS idOferta,ofertas.Descripcion AS de,ofertas.FechaOferta,CONCAT (personas.Nombre,' ',personas.Apellido1,' ',personas.Apellido2) AS Nombre, grados.Grado, grupos.Grupo,secciones.Codigo FROM docentes 
                  JOIN personas on personas.id=docentes.personasid JOIN ofertas on ofertas.Docenteid=docentes.id JOIN grupos ON
                  grupos.id=ofertas.Grupoid JOIN grados ON grados.id=ofertas.Gradoid JOIN secciones ON secciones.id
                  =ofertas.Seccionid WHERE ofertas.id=$id";
                  $o = $db->query($consulta1); //Envia la consulta a la base de datos
                  return json_encode($o->getResultArray());
		}
		else
		{
			$errors = $ofertas->errors(); //recuperar errores de validacion
			return json_encode( $errors); // retorna los errores
		}		
	}
}