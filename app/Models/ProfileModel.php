<?php

namespace App\Models;
use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table      = 'profiles';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [    'id','name','phone','birthdate','webpage','users_fk_id',
                                    'genders_fk_id','addresses_fk_id', 'videos_fk_id'
                                ];
}