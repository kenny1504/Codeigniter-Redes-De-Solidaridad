<?php namespace App\Models;

use CodeIgniter\Model;

class secciones extends Model
{
        protected $table      = 'secciones';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Codigo'];
        protected $useTimestamps = false;

        protected $validationRules = [
                'Codigo'        => 'required|is_unique[secciones.Codigo]'
        ];

        protected $validationMessages = [ // mensages personalizados de validacion
                'Codigo'        => [
                        'is_unique' => 'ya existe la seccion.'
                ]
        ];
}