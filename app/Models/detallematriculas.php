<?php namespace App\Models;

use CodeIgniter\Model;

class detallematriculas extends Model
{
        protected $table      = 'detallematriculas';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Asignaturaid','Matriculaid'];
        protected $useTimestamps = false;
}