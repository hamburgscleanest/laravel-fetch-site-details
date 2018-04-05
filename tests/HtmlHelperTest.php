<?php

namespace hamburgscleanest\LaravelFetchSiteDetails\Tests;

use hamburgscleanest\LaravelFetchSiteDetails\Helpers\HtmlHelper;
use hamburgscleanest\LaravelGuzzleThrottle\LaravelFetchSiteDetailsServiceProvider;

/**
 * Class HtmlHelperTest
 * @package hamburgscleanest\LaravelFetchSiteDetails\Tests
 */
class HtmlHelperTest extends TestCase
{

    /** @test */
    public function gets_all_attributes() : void
    {
        $language = 'en';
        $title = 'Test';
        $description = 'test';
        $keywords = [
            'key1',
            'key2',
            'key3'
        ];

        $html = '<html lang="' . $language .
                '"><head><title>' . $title .
                '</title><meta name="keywords" content="' . \implode(',', $keywords) .
                '" /><meta name="description" content="' . $description .
                '" /></head></html>';

        $htmlHelper = new HtmlHelper($html);

        $this->assertEquals($language, $htmlHelper->getLanguage());
        $this->assertEquals($title, $htmlHelper->getTitle());
        $this->assertEquals($description, $htmlHelper->getDescription());
        $this->assertEquals($keywords, $htmlHelper->getKeywords());
    }

}