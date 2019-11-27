<?php namespace App\Models;

use CodeIgniter\Model;

class turnos extends Model
{
        protected $table      = 'turnos';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Nombre'];
        protected $useTimestamps = false;

        protected $validationRules = [
                'Nombre'        => 'required|is_unique[turnos.Nombre]'
        ];

        protected $validationMessages = [ // mensages personalizados de validacion
                'Nombre'        => [
                        'is_unique' => 'Ya Existe El Turno.'
                ]
        ];
}