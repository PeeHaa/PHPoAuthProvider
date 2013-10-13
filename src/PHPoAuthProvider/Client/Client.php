<?php
/**
 * Client interface
 *
 * PHP version 5.4
 *
 * @category   PHPoAuthProvider
 * @package    Client
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2013 Pieter Hordijk
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0.0
 */
namespace PHPoAuthProvider\Client;

/**
 * Client interface
 *
 * @category   PHPoAuthProvider
 * @package    Client
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
interface Client
{
    /**
     * Fills properties to provided data
     *
     * @param array $data The data to use to fill the properties
     */
    public function fill(array $data);

    /**
     * Gets the id of the client
     *
     * return int The id of the client
     */
    public function getId();

    /**
     * Gets the type of the client
     *
     * The type is either confidential or public
     *
     * return string The type of the client
     */
    public function getType();

    /**
     * Gets the name of the client
     *
     * return string The name of the client
     */
    public function getName();

    /**
     * Gets the website URL of the client
     *
     * return string The website URL of the client
     */
    public function getWebsite();

    /**
     * Gets the description of the client
     *
     * return string The description URL of the client
     */
    public function getDescription();

    /**
     * Gets the logo URL of the client
     *
     * return string The logo URL of the client
     */
    public function getLogo();

    /**
     * Gets the redirection URI of the client
     *
     * return string The redirection URI of the client
     */
    public function getRedirectionEndpoint();
}
