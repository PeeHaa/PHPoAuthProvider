<?php
/**
 * This class represents a non expiring token
 *
 * PHP version 5.4
 *
 * @category   PHPoAuthProvider
 * @package    Token
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2013 Pieter Hordijk
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0.0
 */
namespace PHPoAuthProvider\Token;

/**
 * This class represents a non expiring token
 *
 * @category   PHPoAuthProvider
 * @package    Token
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class NonExpiring extends Token implements Validatable
{
    /**
     * Checks whether the supplied token is valid
     *
     * @param string $token The user supplied token
     *
     * @return boolean True when the token is valid
     */
    public function isValid($token)
    {
        return $this->doesTokenMatch($token);
    }
}
