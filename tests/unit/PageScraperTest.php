<?php

namespace unit;

use App\Filters\PageScraper;
use CodeIgniter\Test\CIUnitTestCase;

class PageScraperTest extends CIUnitTestCase
{
    /**
     * Method to test page scraper extractor.
     *
     * @param $contents
     *   The page contents.
     *
     * @param $params
     *   The extractor params.
     *
     * @param $expected
     *   The expected result.
     *
     * @author Jorge Modesto
     * @since 1.0.0
     * @dataProvider extractionDataProvider
     * @return void
     */
    public function testExtraction($contents, $params, $expected) {

        $pageScraper = new PageScraper($contents);
        $this->assertEquals($expected, $pageScraper->extract($params));
    }

    public function testEmptyNodeException()
    {
        $htmlNoTrackableTags = <<<HTML_NO_TRACKABLE_TAGS
            <html>
                <head>
                    <notitle>This is a valid title</notitle>
                </head>
                <body>
                    Simple body contents
                </body>
            </html>
HTML_NO_TRACKABLE_TAGS;

        $pageScraper = new PageScraper($htmlNoTrackableTags);

        $this->expectException(\InvalidArgumentException::class);
        $pageScraper->extract(['title']);
    }

    public function extractionDataProvider()
    {
        $title = "This is a valid title";
        $exampleLinkContent = "Example link";
        $exampleLinkUrl = "https://www.example.com";
        $anotherExampleLinkContent = "Other example link";
        $anotherExampleLinkUrl = "https://www.otherexample.com";

        $validHtml = <<<HTML
            <html>
                <head>
                    <title>{$title}</title>
                </head>
                <body>
                    <a href="{$exampleLinkUrl}">{$exampleLinkContent}</a>
                    <a href="{$anotherExampleLinkUrl}">{$anotherExampleLinkContent}</a>
                </body>
            </html>
HTML;

        return [
            [
                $validHtml,
                ['title'],
                ['title' => $title],
            ],
            [
                $validHtml,
                ['links'],
                [
                    'links' => [
                        ['description' => $exampleLinkContent, 'url' => $exampleLinkUrl],
                        ['description' => $anotherExampleLinkContent, 'url' => $anotherExampleLinkUrl],
                    ],
                ],
            ],
            [
                $validHtml,
                ['links', 'title'],
                [
                    'title' => $title,
                    'links' => [
                        ['description' => $exampleLinkContent, 'url' => $exampleLinkUrl],
                        ['description' => $anotherExampleLinkContent, 'url' => $anotherExampleLinkUrl],
                    ],
                ],
            ],
        ];
    }
}