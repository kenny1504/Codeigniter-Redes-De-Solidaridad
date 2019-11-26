<?php namespace App\Models;
use CodeIgniter\Model;

class funcionesdeacceso extends Model
{
        protected $table      = 'funcionesdeacceso';
        protected $primaryKey = 'Id_FuncionAcceso';
        protected $returnType = 'array';
        protected $allowedFields = ['Descripcion'];
        protected $useTimestamps = false;
      
}