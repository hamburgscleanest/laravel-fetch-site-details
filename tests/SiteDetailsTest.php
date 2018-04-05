<?php

namespace hamburgscleanest\LaravelFetchSiteDetails\Tests;

use hamburgscleanest\LaravelFetchSiteDetails\Facades\LaravelSiteDetails;
use hamburgscleanest\LaravelFetchSiteDetails\Helpers\CurlHelper;
use hamburgscleanest\LaravelFetchSiteDetails\Models\Site;
use hamburgscleanest\LaravelGuzzleThrottle\LaravelFetchSiteDetailsServiceProvider;
use Illuminate\Support\Facades\App;

/**
 * Class SiteDetailsTest
 * @package hamburgscleanest\LaravelFetchSiteDetails\Tests
 */
class SiteDetailsTest extends TestCase
{

    /** @test */
    public function gets_site_details() : void
    {
        $language = 'en';
        $title = 'Test';
        $description = 'test';
        $keywords = [
            'key1',
            'key2',
            'key3'
        ];

        $url = 'test';
        $html = '<html lang="' . $language .
                '"><head><title>' . $title .
                '</title><meta name="keywords" content="' . \implode(',', $keywords) .
                '" /><meta name="description" content="' . $description .
                '" /></head></html>';

        $curlHelper = \Mockery::mock();
        $curlHelper->shouldReceive('getHtml')->once()->with($url)->andReturn($html);
        App::instance(CurlHelper::class, $curlHelper);

        /** @var Site $website */
        $website = LaravelSiteDetails::fetch($url);

        $this->assertEquals($language, $website->language);
        $this->assertEquals($title, $website->title);
        $this->assertEquals($description, $website->description);
        $this->assertEquals($keywords, $website->keywords);
    }

}