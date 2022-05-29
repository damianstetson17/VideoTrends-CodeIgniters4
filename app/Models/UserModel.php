<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id','email', 'password'];

    protected $validationMessages = [
        'email'        => [
            'is_unique' => '¡Ups! El correo ya pertenece a un usuario existente.',
        ],
    ];
}