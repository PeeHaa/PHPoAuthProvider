<?php

namespace PHPoAuthProviderTest\Unit\Common;

use PHPoAuthProvider\Common\Autoloader;

class AutoloaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PHPoAuthProvider\Common\Autoloader::__construct
     */
    public function testConstructCorrectInstance()
    {
        $autoloader = new Autoloader('Test', '/');

        $this->assertInstanceOf('\\PHPoAuthProvider\\Common\\Autoloader', $autoloader);
    }

    /**
     * @covers PHPoAuthProvider\Common\Autoloader::__construct
     * @covers PHPoAuthProvider\Common\Autoloader::register
     */
    public function testRegister()
    {
        $autoloader = new Autoloader('Test', '/');

        $this->assertTrue($autoloader->register());
    }

    /**
     * @covers PHPoAuthProvider\Common\Autoloader::__construct
     * @covers PHPoAuthProvider\Common\Autoloader::register
     * @covers PHPoAuthProvider\Common\Autoloader::unregister
     */
    public function testUnregister()
    {
        $autoloader = new Autoloader('Test', '/');

        $this->assertTrue($autoloader->register());
        $this->assertTrue($autoloader->unregister());
    }

    /**
     * @covers PHPoAuthProvider\Common\Autoloader::__construct
     * @covers PHPoAuthProvider\Common\Autoloader::register
     * @covers PHPoAuthProvider\Common\Autoloader::load
     */
    public function testLoadSuccess()
    {
        $autoloader = new Autoloader('FakeProject', dirname(__DIR__) . '/../Mocks/Common');

        $this->assertTrue($autoloader->register());

        $someClass = new \FakeProject\NS\SomeClass();

        $this->assertTrue($someClass->isLoaded());
    }

    /**
     * @covers PHPoAuthProvider\Common\Autoloader::__construct
     * @covers PHPoAuthProvider\Common\Autoloader::register
     * @covers PHPoAuthProvider\Common\Autoloader::load
     */
    public function testLoadSuccessExtraSlashedNamespace()
    {
        $autoloader = new Autoloader('\\\\FakeProject', dirname(__DIR__) . '/../Mocks/Common');

        $this->assertTrue($autoloader->register());

        $someClass = new \FakeProject\NS\SomeClass();

        $this->assertTrue($someClass->isLoaded());
    }

    /**
     * @covers PHPoAuthProvider\Common\Autoloader::__construct
     * @covers PHPoAuthProvider\Common\Autoloader::register
     * @covers PHPoAuthProvider\Common\Autoloader::load
     */
    public function testLoadSuccessExtraForwardSlashedPath()
    {
        $autoloader = new Autoloader('FakeProject', dirname(__DIR__) . '/../Mocks/Common//');

        $this->assertTrue($autoloader->register());

        $someClass = new \FakeProject\NS\SomeClass();

        $this->assertTrue($someClass->isLoaded());
    }

    /**
     * @covers PHPoAuthProvider\Common\Autoloader::__construct
     * @covers PHPoAuthProvider\Common\Autoloader::register
     * @covers PHPoAuthProvider\Common\Autoloader::load
     */
    public function testLoadSuccessExtraBackwardSlashedPath()
    {
        $autoloader = new Autoloader('FakeProject', dirname(__DIR__) . '/../Mocks/Common\\');

        $this->assertTrue($autoloader->register());

        $someClass = new \FakeProject\NS\SomeClass();

        $this->assertTrue($someClass->isLoaded());
    }

    /**
     * @covers PHPoAuthProvider\Common\Autoloader::__construct
     * @covers PHPoAuthProvider\Common\Autoloader::register
     * @covers PHPoAuthProvider\Common\Autoloader::load
     */
    public function testLoadSuccessExtraMixedSlashedPath()
    {
        $autoloader = new Autoloader('FakeProject', dirname(__DIR__) . '/../Mocks/Common\\\\/\\//');

        $this->assertTrue($autoloader->register());

        $someClass = new \FakeProject\NS\SomeClass();

        $this->assertTrue($someClass->isLoaded());
    }

    /**
     * @covers PHPoAuthProvider\Common\Autoloader::__construct
     * @covers PHPoAuthProvider\Common\Autoloader::register
     * @covers PHPoAuthProvider\Common\Autoloader::load
     */
    public function testLoadUnknownClass()
    {
        $autoloader = new Autoloader('FakeProject', dirname(__DIR__) . '/../Mocks/Common\\\\/\\//');

        $this->assertTrue($autoloader->register());

        $this->assertFalse($autoloader->load('IDontExistClass'));
    }
}
