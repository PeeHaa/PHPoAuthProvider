<?php
/**
 * Interface for expiring tokens
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
 * Interface for expiring tokens
 *
 * @category   PHPoAuthProvider
 * @package    Token
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
interface Expirable
{
    /**
     * Sets the lifetime of the token
     *
     * @param int lifetime The lifetime of the token
     */
    public function setLifetime($lifetime);
}
