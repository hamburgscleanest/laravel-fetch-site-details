<?php

namespace hamburgscleanest\LaravelFetchSiteDetails\Exceptions;

/**
 * Class InvalidHtmlException
 * @package hamburgscleanest\LaravelFetchSiteDetails\Exceptions
 *
 * @codeCoverageIgnore
 */
class InvalidHtmlException extends \RuntimeException
{

    /**
     * InvalidHtmlException constructor.
     * @param string $html
     */
    public function __construct(string $html)
    {
        parent::__construct('The following HTML is invalid: ' . \PHP_EOL . \PHP_EOL . $html);
    }
}