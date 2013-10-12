PHPoAuthProvider
=

PHPoAuthProvider provides oAuth support in PHP 5.4+ and is very easy to integrate with any project which requires an oAuth provider.

Installation
-

The recommended way to install the library is add a `require` entry in your project's composer file:

    "require": {
        "peehaa/phpoauthprovider": "0.0.*"
    }

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
