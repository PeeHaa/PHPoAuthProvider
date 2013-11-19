<?php

namespace PHPoAuthProviderTest\Unit\Network;

use PHPoAuthProvider\Network\Callback;

class CallbackTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PHPoAuthProvider\Network\Callback::__construct
     */
    public function testConstructImplementsUri()
    {
        $callback = new Callback('https://pieterhordijk.com');

        $this->assertInstanceOf('\\PHPoAuthProvider\\Network\\Uri', $callback);
    }

    /**
     * @covers PHPoAuthProvider\Network\Callback::__construct
     * @covers PHPoAuthProvider\Network\Callback::isValid
     * @covers PHPoAuthProvider\Network\Callback::isOutOfBound
     * @covers PHPoAuthProvider\Network\Callback::isAbsolute
     */
    public function testConstructThrowsExceptionOnMalformedUri()
    {
        if (version_compare(PHP_VERSION, '5.4.7', '<')) {
            $this->markTestSkipped('This test only works in PHP >= 5.4.7');
        }

        $this->setExpectedException('\\PHPoAuthProvider\\Network\\InvalidCallbackUriException');

        // The following only breaks as of php 5.4.7
        $callback = new Callback('///////');
    }

    /**
     * @covers PHPoAuthProvider\Network\Callback::__construct
     * @covers PHPoAuthProvider\Network\Callback::isValid
     * @covers PHPoAuthProvider\Network\Callback::isOutOfBound
     * @covers PHPoAuthProvider\Network\Callback::isAbsolute
     */
    public function testConstructThrowsExceptionOnRelativeUri()
    {
        $this->setExpectedException('\\PHPoAuthProvider\\Network\\InvalidCallbackUriException');

        $callback = new Callback('/relative/uri');
    }

    /**
     * @covers PHPoAuthProvider\Network\Callback::__construct
     * @covers PHPoAuthProvider\Network\Callback::isValid
     * @covers PHPoAuthProvider\Network\Callback::isOutOfBound
     * @covers PHPoAuthProvider\Network\Callback::isAbsolute
     */
    public function testConstructThrowsExceptionOnProtocolRelativeUri()
    {
        $this->setExpectedException('\\PHPoAuthProvider\\Network\\InvalidCallbackUriException');

        $callback = new Callback('//pieterhordijk.com/relative/uri');
    }

    /**
     * @covers PHPoAuthProvider\Network\Callback::__construct
     * @covers PHPoAuthProvider\Network\Callback::isValid
     * @covers PHPoAuthProvider\Network\Callback::isOutOfBound
     */
    public function testConstructValidInOutOfBoundsCallback()
    {
        $callback = new Callback('oob');
    }

    /**
     * @covers PHPoAuthProvider\Network\Callback::__construct
     * @covers PHPoAuthProvider\Network\Callback::isValid
     * @covers PHPoAuthProvider\Network\Callback::isOutOfBound
     * @covers PHPoAuthProvider\Network\Callback::getAbsolute
     */
    public function testGetAbsoluteOutOfBounds()
    {
        $callback = new Callback('oob');

        $this->assertSame('oob', $callback->getAbsolute());
    }

    /**
     * @covers PHPoAuthProvider\Network\Callback::__construct
     * @covers PHPoAuthProvider\Network\Callback::isValid
     * @covers PHPoAuthProvider\Network\Callback::isOutOfBound
     * @covers PHPoAuthProvider\Network\Callback::isAbsolute
     * @covers PHPoAuthProvider\Network\Callback::getAbsolute
     */
    public function testGetAbsoluteWithUri()
    {
        $callback = new Callback('https://pieterhordijk.com');

        $this->assertSame('https://pieterhordijk.com', $callback->getAbsolute());
    }
}
