# hamburgscleanest/laravel-fetch-site-details

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Just a small package to fetch details from other websites, like title, description, language, keywords, ...

## Install

Via Composer

``` bash
$ composer require hamburgscleanest/laravel-fetch-site-details
```

----------

### Automatic Package Discovery

Everything is automatically registered for you.

----------

### Usage

```php
/** @var hamburgscleanest\LaravelFetchSiteDetails\Models\Site $website */
$website = LaravelSiteDetails::fetch('https://www.reddit.com/');
```

----------

#### The following information is available:

The title of the website.

```php
echo $website->title; // 'reddit: the front page of the internet'
```

The website's description.

```php
echo $website->description; // 'reddit: the front page of the internet'
```

Meta keywords that were defined for the website.

```php
echo $website->keywords; // ['reddit', 'reddit.com', 'vote', 'comment', 'submit']
```

The language of the website.

```php
echo $website->language; // 'en'
```

----------

## Changes

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email chroma91@gmail.com instead of using the issue tracker.

## Credits

- [Timo Prüße][link-author]
- [Andre Biel][link-andre]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/hamburgscleanest/laravel-fetch-site-details.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/hamburgscleanest/laravel-fetch-site-details/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/hamburgscleanest/laravel-fetch-site-details.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/hamburgscleanest/laravel-fetch-site-details.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/hamburgscleanest/laravel-fetch-site-details.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/hamburgscleanest/laravel-fetch-site-details
[link-travis]: https://travis-ci.org/hamburgscleanest/laravel-fetch-site-details
[link-scrutinizer]: https://scrutinizer-ci.com/g/hamburgscleanest/laravel-fetch-site-details/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/hamburgscleanest/laravel-fetch-site-details
[link-downloads]: https://packagist.org/packages/hamburgscleanest/laravel-fetch-site-details
[link-author]: https://github.com/Chroma91
[link-andre]: https://github.com/karllson
[link-contributors]: ../../contributors
