<?php

namespace App\Models;
use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table      = 'videos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id','title','search_tags'];
}