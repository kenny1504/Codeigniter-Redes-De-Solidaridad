<?php namespace App\Models;

use CodeIgniter\Model;

class notas extends Model
{
        protected $table      = 'notas';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Nota','DetalleNotaid','DetalleMatriculaid'];
        protected $useTimestamps = false;
}