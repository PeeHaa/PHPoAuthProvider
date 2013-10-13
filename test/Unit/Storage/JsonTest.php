<?php

namespace PHPoAuthProviderTest\Unit\Storage;

use PHPoAuthProvider\Storage\Json;

class JsonTest extends \PHPUnit_Framework_TestCase
{
    private $directory;

    public function setUp()
    {
        $this->directory = __DIR__ . '/../../Data';
    }

    /**
     * @covers PHPoAuthProvider\Storage\Json::__construct
     * @covers PHPoAuthProvider\Storage\Json::normalizeDataDirectory
     */
    public function testConstructCorrectInterface()
    {
        $storage = new Json($this->directory);

        $this->assertInstanceOf('\\PHPoAuthProvider\\Storage\\Medium', $storage);
    }

    /**
     * @covers PHPoAuthProvider\Storage\Json::__construct
     * @covers PHPoAuthProvider\Storage\Json::normalizeDataDirectory
     */
    public function testConstructCorrectInstance()
    {
        $storage = new Json($this->directory);

        $this->assertInstanceOf('\\PHPoAuthProvider\\Storage\\Json', $storage);
    }

    /**
     * @covers PHPoAuthProvider\Storage\Json::__construct
     */
    public function testConstructThrowsExceptionOnInvalidStorageDirectory()
    {
        $this->setExpectedException('\\PHPoAuthProvider\\Storage\\InvalidStorageException');

        $storage = new Json($this->directory . '/invalid-dir');
    }

    /**
     * @covers PHPoAuthProvider\Storage\Json::__construct
     * @covers PHPoAuthProvider\Storage\Json::normalizeDataDirectory
     * @covers PHPoAuthProvider\Storage\Json::registerClient
     * @covers PHPoAuthProvider\Storage\Json::fetch
     * @covers PHPoAuthProvider\Storage\Json::validateType
     * @covers PHPoAuthProvider\Storage\Json::createStorageIfNotExists
     * @covers PHPoAuthProvider\Storage\Json::persist
     */
    public function testRegisterClientCreateNewStorageFileWithTrailingForwardSlash()
    {
        $storage = new Json($this->directory . '/');

        $client = $this->getMock('\\PHPoAuthProvider\\Client\\Client');
        $client->expects($this->once())->method('getType')->will($this->returnValue('testType'));
        $client->expects($this->once())->method('getName')->will($this->returnValue('testName'));
        $client->expects($this->once())->method('getWebsite')->will($this->returnValue('testWebsite'));
        $client->expects($this->once())->method('getDescription')->will($this->returnValue('testDescription'));
        $client->expects($this->once())->method('getLogo')->will($this->returnValue('testLogo'));
        $client->expects($this->once())->method('getRedirectionEndpoint')->will($this->returnValue('testRedirectionEndpoint'));

        $this->assertNull($storage->registerClient($client));
        $this->assertTrue(file_exists($this->directory . '/client.json'));

        $clients = json_decode(file_get_contents($this->directory . '/client.json'), true);

        $storedClient = reset($clients);

        $this->assertSame('testType', $storedClient['type']);
        $this->assertSame('testName', $storedClient['name']);
        $this->assertSame('testWebsite', $storedClient['website']);
        $this->assertSame('testDescription', $storedClient['description']);
        $this->assertSame('testLogo', $storedClient['logo']);
        $this->assertSame('testRedirectionEndpoint', $storedClient['redirectionEndpoint']);

        @unlink($this->directory . '/client.json');
        $this->assertFalse(file_exists($this->directory . '/client.json'));
    }

    /**
     * @covers PHPoAuthProvider\Storage\Json::__construct
     * @covers PHPoAuthProvider\Storage\Json::normalizeDataDirectory
     * @covers PHPoAuthProvider\Storage\Json::registerClient
     * @covers PHPoAuthProvider\Storage\Json::fetch
     * @covers PHPoAuthProvider\Storage\Json::validateType
     * @covers PHPoAuthProvider\Storage\Json::createStorageIfNotExists
     * @covers PHPoAuthProvider\Storage\Json::persist
     */
    public function testRegisterClientCreateNewStorageFileWithTrailingBackwardSlash()
    {
        $storage = new Json($this->directory . '\\');

        $client = $this->getMock('\\PHPoAuthProvider\\Client\\Client');
        $client->expects($this->once())->method('getType')->will($this->returnValue('testType'));
        $client->expects($this->once())->method('getName')->will($this->returnValue('testName'));
        $client->expects($this->once())->method('getWebsite')->will($this->returnValue('testWebsite'));
        $client->expects($this->once())->method('getDescription')->will($this->returnValue('testDescription'));
        $client->expects($this->once())->method('getLogo')->will($this->returnValue('testLogo'));
        $client->expects($this->once())->method('getRedirectionEndpoint')->will($this->returnValue('testRedirectionEndpoint'));

        $this->assertNull($storage->registerClient($client));
        $this->assertTrue(file_exists($this->directory . '/client.json'));

        $clients = json_decode(file_get_contents($this->directory . '/client.json'), true);

        $storedClient = reset($clients);

        $this->assertSame('testType', $storedClient['type']);

        @unlink($this->directory . '/client.json');
        $this->assertFalse(file_exists($this->directory . '/client.json'));
    }

    /**
     * @covers PHPoAuthProvider\Storage\Json::__construct
     * @covers PHPoAuthProvider\Storage\Json::normalizeDataDirectory
     * @covers PHPoAuthProvider\Storage\Json::registerClient
     * @covers PHPoAuthProvider\Storage\Json::fetch
     * @covers PHPoAuthProvider\Storage\Json::validateType
     * @covers PHPoAuthProvider\Storage\Json::createStorageIfNotExists
     * @covers PHPoAuthProvider\Storage\Json::persist
     */
    public function testRegisterClientCreateNewStorageFileWithoutTrailingSlash()
    {
        $storage = new Json($this->directory);

        $client = $this->getMock('\\PHPoAuthProvider\\Client\\Client');
        $client->expects($this->once())->method('getType')->will($this->returnValue('testType'));
        $client->expects($this->once())->method('getName')->will($this->returnValue('testName'));
        $client->expects($this->once())->method('getWebsite')->will($this->returnValue('testWebsite'));
        $client->expects($this->once())->method('getDescription')->will($this->returnValue('testDescription'));
        $client->expects($this->once())->method('getLogo')->will($this->returnValue('testLogo'));
        $client->expects($this->once())->method('getRedirectionEndpoint')->will($this->returnValue('testRedirectionEndpoint'));

        $this->assertNull($storage->registerClient($client));
        $this->assertTrue(file_exists($this->directory . '/client.json'));

        $clients = json_decode(file_get_contents($this->directory . '/client.json'), true);

        $storedClient = reset($clients);

        $this->assertSame('testType', $storedClient['type']);

        @unlink($this->directory . '/client.json');
        $this->assertFalse(file_exists($this->directory . '/client.json'));
    }

    /**
     * @covers PHPoAuthProvider\Storage\Json::__construct
     * @covers PHPoAuthProvider\Storage\Json::normalizeDataDirectory
     * @covers PHPoAuthProvider\Storage\Json::registerClient
     * @covers PHPoAuthProvider\Storage\Json::fetch
     * @covers PHPoAuthProvider\Storage\Json::validateType
     * @covers PHPoAuthProvider\Storage\Json::createStorageIfNotExists
     * @covers PHPoAuthProvider\Storage\Json::persist
     */
    public function testRegisterClientStorageAlreadyExists()
    {
        $storage = new Json($this->directory);

        $client = $this->getMock('\\PHPoAuthProvider\\Client\\Client');
        $client->expects($this->once())->method('getType')->will($this->returnValue('testType'));
        $client->expects($this->once())->method('getName')->will($this->returnValue('testName'));
        $client->expects($this->once())->method('getWebsite')->will($this->returnValue('testWebsite'));
        $client->expects($this->once())->method('getDescription')->will($this->returnValue('testDescription'));
        $client->expects($this->once())->method('getLogo')->will($this->returnValue('testLogo'));
        $client->expects($this->once())->method('getRedirectionEndpoint')->will($this->returnValue('testRedirectionEndpoint'));

        file_put_contents($this->directory . '/client.json', '{}');

        $this->assertNull($storage->registerClient($client));
        $this->assertTrue(file_exists($this->directory . '/client.json'));

        $clients = json_decode(file_get_contents($this->directory . '/client.json'), true);

        $storedClient = reset($clients);

        $this->assertSame('testType', $storedClient['type']);

        @unlink($this->directory . '/client.json');
        $this->assertFalse(file_exists($this->directory . '/client.json'));
    }

    /**
     * @covers PHPoAuthProvider\Storage\Json::__construct
     * @covers PHPoAuthProvider\Storage\Json::normalizeDataDirectory
     * @covers PHPoAuthProvider\Storage\Json::registerClient
     * @covers PHPoAuthProvider\Storage\Json::fetch
     * @covers PHPoAuthProvider\Storage\Json::validateType
     * @covers PHPoAuthProvider\Storage\Json::createStorageIfNotExists
     * @covers PHPoAuthProvider\Storage\Json::persist
     */
    public function testRegisterClientGeneratesUniqueId()
    {
        $storage = new Json($this->directory);

        $client = $this->getMock('\\PHPoAuthProvider\\Client\\Client');
        $client->expects($this->any())->method('getType')->will($this->returnValue('testType'));
        $client->expects($this->any())->method('getName')->will($this->returnValue('testName'));
        $client->expects($this->any())->method('getWebsite')->will($this->returnValue('testWebsite'));
        $client->expects($this->any())->method('getDescription')->will($this->returnValue('testDescription'));
        $client->expects($this->any())->method('getLogo')->will($this->returnValue('testLogo'));
        $client->expects($this->any())->method('getRedirectionEndpoint')->will($this->returnValue('testRedirectionEndpoint'));

        $this->assertNull($storage->registerClient($client));
        $this->assertNull($storage->registerClient($client));

        $clients = json_decode(file_get_contents($this->directory . '/client.json'), true);

        $this->assertSame(2, count($clients));

        $ids = [];
        foreach ($clients as $storedClient) {
            $ids[] = $storedClient['id'];
        }

        $this->assertFalse($ids[0] === $ids[1]);

        @unlink($this->directory . '/client.json');
        $this->assertFalse(file_exists($this->directory . '/client.json'));
    }
}
