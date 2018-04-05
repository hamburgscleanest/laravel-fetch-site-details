<?php

namespace hamburgscleanest\LaravelFetchSiteDetails;

use hamburgscleanest\LaravelFetchSiteDetails\Helpers\CurlHelper;
use hamburgscleanest\LaravelFetchSiteDetails\Helpers\HtmlHelper;
use hamburgscleanest\LaravelFetchSiteDetails\Models\SiteDetails;
use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelFetchSiteDetailsServiceProvider
 * @package hamburgscleanest\LaravelFetchSiteDetails
 */
class LaravelFetchSiteDetailsServiceProvider extends ServiceProvider
{

    /**
     * Register any package services.
     *
     * @return void
     * @throws \hamburgscleanest\LaravelFetchSiteDetails\Exceptions\InvalidHtmlException
     */
    public function register() : void
    {
        $this->app->singleton('laravel-site-details', function()
        {
            return new SiteDetails();
        });

        $this->app->bind('html-helper', function(string $html)
        {
            return new HtmlHelper($html);
        });

        $this->app->singleton('fetch-helper', function()
        {
            return new CurlHelper();
        });
    }
}