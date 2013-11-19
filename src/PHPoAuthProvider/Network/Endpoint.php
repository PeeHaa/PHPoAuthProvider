<?php
/**
 * Interface for classes that represent an endpoint in the oauth process
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
 * Interface for classes that represent an endpoint in the oauth process
 *
 * @category   PHPoAuthProvider
 * @package    Network
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
interface Endpoint
{
    /**
     * Gets the endpoint URI
     *
     * @param string The endpoint URI
     */
    public function getUri();

    /**
     * Checks whether the request is valid
     *
     * @param \PHPoAuthProvider\Network\Http\RequestData $request The data of the request
     *
     * @return boolean True when the request is valid
     */
    public function isRequestValid(RequestData $request);
}
