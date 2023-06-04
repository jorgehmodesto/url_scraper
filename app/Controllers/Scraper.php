<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PageModel;

class Scrap extends BaseController
{
    /**
     * @var PageModel $pageModel
     */
    protected $pageModel;

    public function __construct()
    {
        $this->pageModel = model('PageModel');
    }

    public function index()
    {
        return view('scraper/index');
    }

    public function pages()
    {
        $pages = $this->pageModel->asObject()->findAll();
        $data = [];

        foreach ($pages as $page) {

            $pageName = '<a href="' . route_to('page/$1', $page->id) . '">' . $page->name . '</a>';

            if ($page->status == PAGE_SCRAPE_IN_PROGRESS) {
                $data[] = [$pageName, 'In progress...'];
                continue;
            }

            $pageLinks = $this->pageModel->links($page->id);
            $data[] = [$pageName, count($pageLinks)];
        }

        return $this->response->setJSON([
            'data' => $data
        ]);
    }
}
