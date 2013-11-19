<?php
/**
 * Class which represents the endpoint for temporary credentials in the oauth process
 *
 * This is the first step in the oauth process
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
 * Class which represents the endpoint for temporary credentials in the oauth process
 *
 * @category   PHPoAuthProvider
 * @package    Network
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class TemporaryCredentials extends BaseEndpoint implements Endpoint
{
    /**
     * Checks whether the request is valid
     *
     * @param \PHPoAuthProvider\Network\Http\RequestData $request The data of the request
     *
     * @return boolean True when the request is valid
     */
    public function isRequestValid(RequestData $request)
    {
        return $this->isConnectionSecurityValid($request) && $this->isPostDataValid($request);
    }

    /**
     * Checks whether the connection's security is valid
     *
     * @param \PHPoAuthProvider\Network\Http\RequestData $request The data of the request
     *
     * @return boolean True when the request is valid
     */
    private function isConnectionSecurityValid(RequestData $request)
    {
        return !$this->secure || $request->isSecure();
    }

    /**
     * Checks whether the request's post data is valid
     *
     * http://tools.ietf.org/html/rfc5849#section-3.2
     *
     * the post body needs to start with Authorization:
     * the post body needs to contain OAuth realm="(.)+"
     * the post body needs to contain oauth_consumer_key and the key must be valid
     * the post body needs to contain oauth_signature_method and the key must be PLAINTEXT?
     * the post body needs to contain oauth_callback and the callback must be valid and registered
     * the post body needs to contain oauth_signature and the signature must be valid
     *
     * @todo Check whether the above is correct according to the spec
     * @todo Actually check on all of the above
     *
     * @param \PHPoAuthProvider\Network\Http\RequestData $request The data of the request
     *
     * @return boolean True when the request is valid
     */
    private function isPostDataValid(RequestData $request)
    {
        return preg_match('/^Authorization:/', $request->rawPost()) === 1;
    }
}
