<?php namespace App\Models;

use CodeIgniter\Model;

class estudiantes extends Model
{
        protected $table      = 'estudiantes';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['personasid','CodigoEstudiante','parentescoid','tutorid'];
        protected $useTimestamps = false;

}