PHPoAuthProvider
=

PHPoAuthProvider provides oAuth support in PHP 5.4+ and is very easy to integrate with any project which requires an oAuth provider.

[![Build Status](https://travis-ci.org/PeeHaa/PHPoAuthProvider.png?branch=master)](https://travis-ci.org/PeeHaa/PHPoAuthProvider) [![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/PeeHaa/PHPoAuthProvider/badges/quality-score.png?s=60a4ff6f6e4b996632da8fae1e3faa73b4cef9fd)](https://scrutinizer-ci.com/g/PeeHaa/PHPoAuthProvider/) [![Code Coverage](https://scrutinizer-ci.com/g/PeeHaa/PHPoAuthProvider/badges/coverage.png?s=938b8c88bd058242b66ceeeb34aaa9b0c1f7fa57)](https://scrutinizer-ci.com/g/PeeHaa/PHPoAuthProvider/) [![Latest Stable Version](https://poser.pugx.org/peehaa/phpoauthprovider/v/stable.png)](https://packagist.org/packages/peehaa/phpoauthprovider) [![Total Downloads](https://poser.pugx.org/peehaa/phpoauthprovider/downloads.png)](https://packagist.org/packages/peehaa/phpoauthprovider)

Installation
-

The recommended way to install the library is add a `require` entry in your project's composer file:

    "require": {
        "peehaa/phpoauthprovider": "0.0.*"
    }

Optionally you could manually clone the repository:

    git clone https://github.com/PeeHaa/PHPoAuthProvider.git

Or manually download a release.

When cloning or manully downloading a release the library's bootstrap should be included in the project to enable autoloading of the library or the library should be included in another (existing) autoloader stack. The library is compliant with PSR-0.

Features
-

- PSR-0 compliant for easy interoperability
- Secure default settings
- Unit tested
- Support for oAuth 1a ([rfc6749][rfc6749])
- Support for oAuth 2.0 ([spec][oauth1a-spec])

Implementations
-

None yet. Obviously more to come :-)

Version
-

v0.0.1

This library uses [Semantic Versioning 2.0.0][semver].

This library is currently not suitable for production purposes.

Client
-

For an oAuth client instead of a provider see the [PHPoAuthLib project][phpoauthlib]

[phpoauthlib]: https://github.com/Lusitanian/PHPoAuthLib
[rfc6749]: http://tools.ietf.org/html/rfc6749
[oauth1a-spec]: http://oauth.net/core/1.0a/
[semver]: http://semver.org/
