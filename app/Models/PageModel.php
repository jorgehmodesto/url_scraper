<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pages';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'name', 'status'
    ];

    public function links($pageId)
    {
        return $this->db->table('links')
            ->where('page_id', $pageId)
            ->get()
            ->getResult();
    }
}
