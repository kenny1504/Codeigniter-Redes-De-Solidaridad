<?php namespace App\Models;

use CodeIgniter\Model;

class gradoaasignaturas extends Model
{
        protected $table      = 'gradoaasignaturas';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Gradoid','Asignaturaid'];
        protected $useTimestamps = false;
}