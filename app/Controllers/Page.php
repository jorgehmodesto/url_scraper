<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Page extends BaseController
{
    public function index($id)
    {
        return view('page/index');
    }
}
