<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PageModel;

class Page extends BaseController
{
    /**
     * @var PageModel $pageModel
     */
    protected $pageModel;

    public function __construct()
    {
        $this->pageModel = model('PageModel');
    }

    public function index($page_id)
    {
        return view('page/index', [
            'page_id' => $page_id
        ]);
    }

    public function links($page_id)
    {
        /**
         * @var PageModel $links
         */
        $links = $this->pageModel->links($page_id);
        $data = [];

        foreach ($links as $link) {

            $data[] = [
                $link->description,
                sprintf("<a href='%s' target='_blank'>%s</a>", $link->url, $link->url)
            ];
        }

        return $this->response->setJSON([
            'data' => $data
        ]);
    }
}
