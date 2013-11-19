<?php
/**
 * This class represents a expiring token
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
 * This class represents a expiring token
 *
 * @category   PHPoAuthProvider
 * @package    Token
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class Expiring extends Token implements Validatable, Expirable
{
    /**
     * @var int Lifetime of the token in seconds
     */
    private $lifetime = 300;

    /**
     * Sets the lifetime of the token
     *
     * @param int lifetime The lifetime of the token
     */
    public function setLifetime($lifetime)
    {
        $this->lifetime = $lifetime;
    }

    /**
     * Checks whether the supplied token is valid
     *
     * @param string $token The user supplied token
     *
     * @return boolean True when the token is valid
     */
    public function isValid($token)
    {
        return $this->doesTokenMatch($token) && !$this->isExpired();
    }

    /**
     * Checks whether the token is expired
     *
     * @return boolean True when the token is expired
     */
    private function isExpired()
    {
        $expiration = $this->created->add(new \DateInterval('PT' . $this->lifetime . 'S'));

        return $expiration->format('U') < (new \DateTime('now'))->format('U');
    }
}
