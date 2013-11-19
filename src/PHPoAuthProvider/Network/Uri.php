<?php
/**
 * Interface for classes that represent an URI
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
 * Interface for classes that represent an URI
 *
 * @category   PHPoAuthProvider
 * @package    Network
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
interface Uri
{
    /**
     * Gets the absolute representation of the URI
     */
    public function getAbsolute();
}
