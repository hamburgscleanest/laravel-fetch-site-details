<?php

namespace hamburgscleanest\LaravelFetchSiteDetails\Models;

use hamburgscleanest\LaravelFetchSiteDetails\Helpers\CurlHelper;
use hamburgscleanest\LaravelFetchSiteDetails\Helpers\HtmlHelper;

/**
 * Class Site
 * @package hamburgscleanest\LaravelFetchSiteDetails\Models
 *
 * @property string $title
 * @property string $description
 * @property array $keywords
 * @property string $language
 */
class Site
{

    /** @var HtmlHelper */
    private $_htmlHelper;

    /**
     * Site constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        /**
         * Use 'html-helper' instead of HtmlHelper::class..
         * Use 'fetch-helper' instead of CurlHelper::class..
         */
        $this->_htmlHelper = \app()->make(HtmlHelper::class, ['html' => \app()->make(CurlHelper::class)->getHtml($url)]);
    }


    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->_htmlHelper->{'get' . \ucfirst($name)}();
    }
}