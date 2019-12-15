<?php namespace App\Models;

use CodeIgniter\Model;

class detallesNota extends Model
{
        protected $table      = 'detallenotas';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Descripcion'];
        protected $useTimestamps = false;
}