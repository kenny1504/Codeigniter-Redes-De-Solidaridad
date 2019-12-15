<?php namespace App\Models;

use CodeIgniter\Model;

class situacionmatriculas extends Model
{
        protected $table      = 'situacionmatriculas';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Descripcion'];
        protected $useTimestamps = false;
}