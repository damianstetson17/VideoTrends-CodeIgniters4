<?php

namespace App\Models;
use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table      = 'addresses';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'street',	'number', 'latitude','longitude',
    	                        'cities_fk_id',	'provinces_fk_id',	'countries_fk_id'];
}