<?php
/**
 * JSON storage
 *
 * Stores information directly on the file system. This storage medium should only be used in development environments.
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
 * JSON storage
 *
 * @category   PHPoAuthProvider
 * @package    Storage
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class Json implements Medium
{
    /**
     * @var string Location of the data directory
     */
    private $dataDirectory;

    /**
     * Creates instance and sets the data directory
     *
     * @param string $dataDirectory The data directory
     *
     * @throws \PHPoAuthProvider\Storage\InvalidStorageException When the data directory is invalid
     */
    public function __construct($dataDirectory)
    {
        $dataDirectory = $this->normalizeDataDirectory($dataDirectory);

        if (!is_dir($dataDirectory)) {
            throw new InvalidStorageException('Invalid data directory (`' . $dataDirectory . '`) supplied.');
        }

        $this->dataDirectory = $dataDirectory;
    }

    /**
     * Normalizes the data directory. The result will be a path without trailing slashes
     *
     * @param string $dataDirectory The directory to normalize
     *
     * @return string The normalized data directory
     */
    private function normalizeDataDirectory($dataDirectory)
    {
        return rtrim($dataDirectory, '\\/');
    }

    /**
     * Registers a client
     *
     * @param \PHPoAuthProvider\Client\Client The client to register
     */
    public function registerClient(Client $client)
    {
        $clients = $this->fetch('client');

        $id = uniqid('', true);

        $clients[$id] = [
            'id'                  => $id,
            'type'                => $client->getType(),
            'name'                => $client->getName(),
            'website'             => $client->getWebsite(),
            'description'         => $client->getDescription(),
            'logo'                => $client->getLogo(),
            'redirectionEndpoint' => $client->getRedirectionEndpoint(),
        ];

        $this->persist('client', $clients);
    }

    /**
     * Fetches data from the storage based on the type
     *
     * @param string $type The data type of which to get the storage results
     *
     * @return array The storage results
     */
    private function fetch($type)
    {
        $this->validateType($type);

        $storageLocation = $this->dataDirectory . '/' . $type . '.json';

        $this->createStorageIfNotExists($storageLocation);

        return json_decode(file_get_contents($storageLocation), true);
    }

    /**
     * Persists the data
     *
     * @param string $type The data type of which to get the storage results
     * @param array  $data The data to persist
     */
    private function persist($type, array $data)
    {
        $this->validateType($type);

        $storageLocation = $this->dataDirectory . '/' . $type . '.json';

        $this->createStorageIfNotExists($storageLocation);

        file_put_contents($storageLocation, json_encode($data));
    }

    /**
     * Validates the storage type
     *
     * @throws \PHPoAuthProvider\Storage\InvalidTypeException When the data storage type is invalid
     */
    private function validateType($type)
    {
        $validTypes = ['client'];

        if (!in_array($type, $validTypes, true)) {
            throw new InvalidTypeException('Invalid storage type: ' . $type);
        }
    }

    /**
     * Checks if storage exists and if not creates the json file
     *
     * @param string $storageLocation The full path to the storage file
     */
    private function createStorageIfNotExists($storageLocation)
    {
        if (!file_exists($storageLocation)) {
            file_put_contents($storageLocation, '{}');
        }
    }
}
