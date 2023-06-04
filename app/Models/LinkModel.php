<?php

namespace App\Models;

use CodeIgniter\Model;

class LinkModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'links';
    protected $primaryKey       = 'id';
}
