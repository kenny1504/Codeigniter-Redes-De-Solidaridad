<?php namespace App\Models;

use CodeIgniter\Model;

class usuarios extends Model
{
        protected $table      = 'usuarios';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Cedula,ClaveDeUsuario,Nombre,NombreDeUsuario'];
        protected $useTimestamps = false;

        protected $validationRules = [
                'NombreDeUsuario'        => 'required|is_unique[usuarios.NombreDeUsuario]',
                'ClaveDeUsuario'        => 'required',
                'Cedula'        => 'required|is_unique[usuarios.Cedula]'

        ];
    
        protected $validationMessages =[

                'NombreDeUsuario' =>[
                        'is_unique'=> 'El nombre de usuario ya existe'
                ],
                 'Cedula' =>[
                        'is_unique'=> 'El Numero de Cedula  ya existe'
                 ]
        ];
               
}