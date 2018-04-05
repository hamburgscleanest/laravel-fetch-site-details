<?php

namespace hamburgscleanest\LaravelFetchSiteDetails\Helpers;

/**
 * Class CurlHelper
 * @package hamburgscleanest\LaravelFetchSiteDetails\Helpers
 *
 * @codeCoverageIgnore
 */
class CurlHelper
{

    /** @var string */
    private const USER_AGENT = 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.94 Safari/537.36';

    /**
     * @param string $url
     * @return string
     */
    public function getHtml(string $url) : string
    {
        $curl = \curl_init();
        \curl_setopt($curl, CURLOPT_URL, $url);
        \curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($curl, CURLOPT_USERAGENT, self::USER_AGENT);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $html = \curl_exec($curl);
        \curl_close($curl);

        return $html;
    }
}