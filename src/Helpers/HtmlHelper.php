<?php

namespace hamburgscleanest\LaravelFetchSiteDetails\Helpers;

use DOMDocument;
use hamburgscleanest\LaravelFetchSiteDetails\Exceptions\InvalidHtmlException;

/**
 * Class HtmlHelper
 * @package hamburgscleanest\LaravelFetchSiteDetails\Helpers
 *
 * TODO: Needs to be optimized.. :P
 */
class HtmlHelper
{

    /** @var DOMDocument */
    private $_domDocument;
    /** @var string */
    private $_title;
    /** @var string */
    private $_language;
    /** @var string */
    private $_description;
    /** @var array */
    private $_keywords;

    /**
     * HtmlHelper constructor.
     * @param string $html
     * @throws \hamburgscleanest\LaravelFetchSiteDetails\Exceptions\InvalidHtmlException
     */
    public function __construct(string $html)
    {
        $this->_domDocument = new DOMDocument('1.0', 'UTF-8');
        if (!$this->_domDocument->loadHTML($html, LIBXML_NOERROR))
        {
            // @codeCoverageIgnoreStart
            throw new InvalidHtmlException($html);
            // @codeCoverageIgnoreEnd
        }
    }

    /**
     * @return null|string
     */
    public function getTitle() : ?string
    {
        if ($this->_title === null)
        {
            $this->_setTitle();
        }

        return $this->_title;
    }

    private function _setTitle() : void
    {
        $titleNode = $this->_domDocument->getElementsByTagName('title');
        $this->_title = $titleNode->length > 0 ? $titleNode->item('0')->nodeValue : '';
    }

    /**
     * @return null|string
     */
    public function getDescription() : ?string
    {
        if ($this->_description === null)
        {
            $this->_setMetaAttributes();
        }

        return $this->_description;
    }

    private function _setMetaAttributes() : void
    {
        $this->_description = '';
        $this->_keywords = [];
        $metaAttributes = $this->_domDocument->getElementsByTagName('meta');

        $i = 0;
        while ($i < $metaAttributes->length && ($this->_description === '' || \count($this->_keywords) === 0))
        {
            $meta = $metaAttributes->item($i);
            $this->_setMetaAttribute(\mb_strtolower($meta->getAttribute('name')), $meta->getAttribute('content'));

            $i++;
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    private function _setMetaAttribute(string $name, $value) : void
    {
        if ($name === 'keywords')
        {
            $this->_keywords = \explode(',', $value);
        } else
        {
            $this->{'_' . $name} = $value;
        }
    }

    /**
     * @return null|array
     */
    public function getKeywords() : ?array
    {
        if ($this->_keywords === null)
        {
            $this->_setMetaAttributes();
        }

        return $this->_keywords;
    }

    /**
     * @return string
     * @throws \hamburgscleanest\LaravelFetchSiteDetails\Exceptions\InvalidHtmlException
     */
    public function getLanguage() : string
    {
        if ($this->_language === null)
        {
            $this->_language = \mb_substr($this->_domDocument->getElementsByTagName('html')->item(0)->getAttribute('lang'), 0, 2);
        }

        return $this->_language;
    }
}