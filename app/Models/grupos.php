<?php namespace App\Models;

use CodeIgniter\Model;

class grupos extends Model
{
        protected $table      = 'grupos';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Grupo'];
        protected $useTimestamps = false;

        protected $validationRules = [
                'Grupo'        => 'required|is_unique[grupos.Grupo]'
        ];

        protected $validationMessages = [ // mensages personalizados de validacion
                'Grupo'        => [
                        'is_unique' => 'ya existe el grupo.'
                ]
        ];
}