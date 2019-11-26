<?php namespace App\Models;

use CodeIgniter\Model;

class matriculas extends Model
{
        protected $table      = 'matriculas';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Fecha','Ofertaid','Turnoid','SituacionMatriculaid','Estudianteid'];
        protected $useTimestamps = false;
}