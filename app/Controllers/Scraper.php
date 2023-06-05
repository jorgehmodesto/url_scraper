<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Filters\PageScraper;
use App\Models\LinkModel;
use App\Models\PageModel;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\Request;
use Symfony\Component\DomCrawler\Crawler;

class Scraper extends BaseController
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

    public function savePage()
    {
        $page_url = $this->request->getVar('page_url');
        $curl = Services::curlrequest();
        $response = $curl->request('GET', $page_url);

        $contents = $response->getBody();

        $pageScraper = new PageScraper($contents);

        $extractedItems = $pageScraper->extract(['title']);

        if (empty($extractedItems['title'])) {
            throw new \Exception('Page title not found');
        }

        $this->pageModel->insert(['name' => $extractedItems['title'], 'status' => PAGE_SCRAPE_IN_PROGRESS]);

        return $this->response->setJSON([
            'page_id' => $this->pageModel->getInsertID(),
            'page_url' => $page_url
        ]);
    }

    public function savePageLinks()
    {
        $page_url = $this->request->getVar('page_url');
        $page_id = $this->request->getVar('page_id');

        try {

            $curl = Services::curlrequest();
            $response = $curl->request('GET', $page_url);

            $contents = $response->getBody();

            $pageScraper = new PageScraper($contents);

            $scrapedLinks = $pageScraper->extract(['links']);

            foreach ($scrapedLinks['links'] as $link) {

                $pageLink = model('LinkModel');
                $pageLink->insert([
                    'page_id' => $page_id,
                    'description' => $link['description'],
                    'url' => $link['url'],
                ]);
            }

            $this->pageModel->update($page_id, ['status' => PAGE_SCRAPE_SUCCESS]);

            return $this->response->setJSON(['success' => true]);

        } catch (\Exception $e) {
            print($e->getMessage());
            exit;
            /**
             * @var PageModel $page
             */
            $this->pageModel->update($page_id, ['status' => PAGE_SCRAPE_FAILED]);
        }
    }
}
