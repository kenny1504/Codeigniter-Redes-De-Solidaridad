<?php namespace App\Models;

use CodeIgniter\Model;

class personas extends Model
{
        protected $table      = 'personas';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Cedula','Nombre','Apellido1','Apellido2','Sexo','Direccion','Correo','Telefono','FechaNacimiento'];
        protected $useTimestamps = false;
}