<?php namespace App\Models;

use CodeIgniter\Model;

class ofertas extends Model
{
        protected $table      = 'ofertas';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Descripcion','FechaOferta','Seccionid','Gradoid','Grupoid','Docenteid'];
        protected $useTimestamps = false;
}