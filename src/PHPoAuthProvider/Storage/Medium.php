<?php
/**
 * Storage medium interface
 *
 * PHP version 5.4
 *
 * @category   PHPoAuthProvider
 * @package    Storage
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2013 Pieter Hordijk
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0.0
 */
namespace PHPoAuthProvider\Storage;

use PHPoAuthProvider\Client\Client;

/**
 * Storage medium interface
 *
 * @category   PHPoAuthProvider
 * @package    Storage
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
interface Medium
{
    /**
     * Registers a client
     *
     * @param \PHPoAuthProvider\Client\Client The client to register
     */
    public function registerClient(Client $client);
}
