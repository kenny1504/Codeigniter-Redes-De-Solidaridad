<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\docentes;
use App\Models\personas;

class docente extends BaseController
{
    public function cargardocentes()
	{
        $docente=new docentes();
        $resultado= $docente->findAll();
        return json_encode($resultado);// retorna vista y se envian datos 
        
    }
}