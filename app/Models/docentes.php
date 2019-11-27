<?php namespace App\Models;

use CodeIgniter\Model;

class docentes extends Model
{
        protected $table      = 'docentes';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['personasid','Estado'];
        protected $useTimestamps = false;
}