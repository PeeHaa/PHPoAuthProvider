<?php
/**
 * Class which represents a callback URI
 *
 * PHP version 5.4
 *
 * @category   PHPoAuthProvider
 * @package    Network
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2013 Pieter Hordijk
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0.0
 */
namespace PHPoAuthProvider\Network;

/**
 * Class which represents a callback URI
 *
 * @category   PHPoAuthProvider
 * @package    Network
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class Callback implements Uri
{
    /**
     * @var string The absolute or relative URI
     */
    private $uri;

    /**
     * Creates instance
     *
     * @param string $uri The absolute / relative URI
     *
     * @throws \PHPoAuthProvider\Network\InvalidCallbackUriException When the client supplied callback URI is invalid
     */
    public function __construct($uri)
    {
        if (!$this->isValid($uri)) {
            throw new InvalidCallbackUriException('The supplied URI (`' . $uri . '`) is not a valid callback URI.');
        }

        $this->uri = $uri;
    }

    /**
     * Validates the callback URI
     *
     * @param string The callback URI cupplied by the client
     *
     * @return boolean True when the client supplied callback URI is valid
     */
    private function isValid($uri)
    {
        if (!$this->isOutOfBound($uri) && !$this->isAbsolute($uri)) {
            return false;
        }

        return true;
    }

    /**
     * Checks whether the client uses an out of bound configuration for callbacks
     *
     * If the client is unable to receive callbacks or a callback URI has been established via other means,
     * the parameter value MUST be set to "oob" (case sensitive), to indicate an out-of-band configuration.
     *
     * http://tools.ietf.org/html/rfc5849#section-2.1
     *
     * @param string $uri The callback URI supplied by the client
     *
     * @return boolean True when the client uses an out of bound configuration
     */
    private function isOutOfBound($uri)
    {
        return $uri === 'oob';
    }

    /**
     * Check whether the client supplied callback is absolute
     *
     * Note that the first check (whether `parse_url` returns false) is only there for reeeeeally stupid clients
     * with reeeeeeeally broken URI's
     *
     * @param string $uri The callback supplied by the client
     *
     * @return boolean True when the client supplied URI is absolute
     */
    private function isAbsolute($uri)
    {
        $uriParts = parse_url($uri);

        return $uriParts !== false && array_key_exists('scheme', $uriParts) && array_key_exists('host', $uriParts);
    }

    /**
     * Gets the absolute representation of the URI
     */
    public function getAbsolute()
    {
        return $this->uri;
    }
}
