<?php
/**
 * Abstract class for oauth endpoint
 *
 * The name really sucks, so if you are annoyed by this as me *and* you can
 * come up with a better name please: fix it fix it fix it fix it fix it fix it fix
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

use \PHPoAuthProvider\Network\Http\RequestData;

/**
 * Abstract class for oauth endpoint
 *
 * @category   PHPoAuthProvider
 * @package    Network
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
abstract class BaseEndpoint
{
    /**
     * @var string The URI of the endpoint
     */
    private $uri;

    /**
     * @var boolean Whether the request is enforced to go over an secure connection
     */
    protected $secure;

    /**
     * Creates instance
     *
     * Although there is the option to not enforce a secure connection this really should not be changed, because the
     * client sends the credentials in plaintext to us. This flag is only added for convenience and should only be
     * used in development and only when you know what you are doing. Doing otherwise is both irresponible and stupid.
     * From the spec:
     *
     * Since the request results in the transmission of plain text credentials in the HTTP response, the server
     * MUST require the use of a transport-layer mechanisms such as TLS or Secure Socket Layer (SSL)
     * (or a secure channel with equivalent protections).
     *
     * @param string  $uri    The URI of the endpoint
     * @param boolean $secure Whether the request is enforced to go over an secure connection
     */
    public function __construct($uri, $secure = true)
    {
        $this->uri    = $uri;
        $this->secure = $secure;
    }

    /**
     * Gets the endpoint URI
     *
     * @param string The endpoint URI
     */
    public function getUri()
    {
        return $this->uri;
    }
}
