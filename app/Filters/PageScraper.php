<?php

namespace App\Filters;

use Symfony\Component\DomCrawler\Crawler;

class PageScraper
{
    /**
     * @var Crawler $crawler
     */
    private $crawler;

    public function __construct($contents) {
        $this->crawler = new Crawler($contents);
    }

    public function extract($items = []) {

        $extractedItems = [];

        if (in_array('title', $items)) {

            $extractedItems['title'] = $this->crawler->filterXPath('//title')->text();
        }

        if (in_array('links', $items)) {

            $links = $this->crawler->filterXPath('//a');

            $extractedItems['links'] = $links->each(function (Crawler $node) {
                return [
                    'description' => substr($node->text(), 0, 100),
                    'url' => $node->attr('href'),
                ];
            });
        }

        return $extractedItems;
    }
}