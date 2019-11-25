<?php namespace App\Models;

use CodeIgniter\Model;

class oficios extends Model
{
        protected $table      = 'oficios';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Nombre'];
        protected $useTimestamps = false;

        protected $validationRules = [
                'Nombre'        => 'required|is_unique[oficios.Nombre]'
        ];

        protected $validationMessages = [ // mensages personalizados de validacion
                'Nombre'        => [
                        'is_unique' => 'Priks ya existe el Tutor.'
                ]
        ];
}

