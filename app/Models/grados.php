<?php namespace App\Models;

use CodeIgniter\Model;

class grados extends Model
{
        protected $table      = 'grados';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Grado'];
        protected $useTimestamps = false;


        protected $validationRules = [
                'Grado'        => 'required|is_unique[grados.Grado]',
                'Grado'        => 'required|numeric[grados.Grado]',
                'Grado'        => 'required|integer[grados.Grado]'
        ];

        protected $validationMessages = [ // mensages personalizados de validacion
                'Grado'        => [
                        'is_unique' => 'ya existe el grado.',
                        'numeric' => 'Campo solo acepta numero.',
                        'integer' => 'Campo solo acepta numero entero.'
                ]
        ];
}