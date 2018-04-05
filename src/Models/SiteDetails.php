<?php

namespace hamburgscleanest\LaravelFetchSiteDetails\Models;

/**
 * Class SiteDetails
 * @package hamburgscleanest\LaravelFetchSiteDetails\Models
 */
class SiteDetails
{

    /**
     * @param string $url
     * @return Site
     */
    public function fetch(string $url) : Site
    {
        return new Site($url);
    }
}