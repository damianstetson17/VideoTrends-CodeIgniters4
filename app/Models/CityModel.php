<?php

namespace App\Models;
use CodeIgniter\Model;

class CityModel extends Model
{
    protected $table      = 'cities';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'name'];
}