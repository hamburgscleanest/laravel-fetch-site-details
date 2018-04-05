<?php

namespace hamburgscleanest\LaravelFetchSiteDetails\Tests;

use hamburgscleanest\LaravelFetchSiteDetails\LaravelFetchSiteDetailsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

/**
 * Class TestCase
 * @package hamburgscleanest\LaravelFetchSiteDetails\Tests
 */
class TestCase extends Orchestra
{

    public function setUp() : void
    {
        parent::setUp();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app) : array
    {
        return [LaravelFetchSiteDetailsServiceProvider::class];
    }
}