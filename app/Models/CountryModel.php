<?php

namespace App\Models;
use CodeIgniter\Model;

class CountryModel extends Model
{
    protected $table      = 'countries';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'name'];
}