<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Scrap extends BaseController
{
    public function index()
    {
        return view('scraper/index');
    }
}
