<?php

namespace hamburgscleanest\LaravelFetchSiteDetails\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class LaravelSiteDetails
 * @package hamburgscleanest\LaravelFetchSiteDetails\Facades
 */
class LaravelSiteDetails extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string { return 'laravel-site-details'; }
}