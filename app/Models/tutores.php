<?php namespace App\Models;

use CodeIgniter\Model;

class tutores extends Model
{
        protected $table      = 'tutores';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['personasid','Oficiosid'];
        protected $useTimestamps = false;
}