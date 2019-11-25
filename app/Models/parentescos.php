<?php namespace App\Models;

use CodeIgniter\Model;

class parentescos extends Model
{
        protected $table      = 'parentescos';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['Parentesco'];
        protected $useTimestamps = false;

        protected $validationRules = [
                'Parentesco'        => 'required|is_unique[parentescos.Parentesco]'
        ];

        protected $validationMessages = [ // mensages personalizados de validacion
                'Parentesco'        => [
                        'is_unique' => 'Ya Existe el Parentesco.'
                ]
        ];
}