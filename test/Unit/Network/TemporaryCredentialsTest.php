<?php

namespace PHPoAuthProviderTest\Unit\Network;

use PHPoAuthProvider\Network\TemporaryCredentials;

class TemporaryCredentialsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::__construct
     */
    public function testConstructImplementsEndpoint()
    {
        $endpoint = new TemporaryCredentials('/endpoint/uri');

        $this->assertInstanceOf('\\PHPoAuthProvider\\Network\\Endpoint', $endpoint);
    }

    /**
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::__construct
     */
    public function testConstructExtendsBaseEndpoint()
    {
        $endpoint = new TemporaryCredentials('/endpoint/uri');

        $this->assertInstanceOf('\\PHPoAuthProvider\\Network\\BaseEndpoint', $endpoint);
    }

    /**
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::__construct
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isRequestValid
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isConnectionSecurityValid
     */
    public function testIsRequestValidFailsOnInsecureRequest()
    {
        $endpoint = new TemporaryCredentials('/endpoint/uri');

        $request = $this->getMock('\\PHPoAuthProvider\\Network\\Http\\RequestData');
        $request->expects($this->once())->method('isSecure')->will($this->returnValue(false));

        $this->assertFalse($endpoint->isRequestValid($request));
    }

    /**
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::__construct
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isRequestValid
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isConnectionSecurityValid
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isPostDataValid
     */
    public function testIsRequestValidFailsOnMIssingAuthorizationKeyInRawPostData()
    {
        $endpoint = new TemporaryCredentials('/endpoint/uri');

        $request = $this->getMock('\\PHPoAuthProvider\\Network\\Http\\RequestData');
        $request->expects($this->once())->method('isSecure')->will($this->returnValue(true));
        $request->expects($this->once())->method('rawPost')->will($this->returnValue('Missing auth value in raw post'));

        $this->assertFalse($endpoint->isRequestValid($request));
    }

    /**
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::__construct
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isRequestValid
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isConnectionSecurityValid
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isPostDataValid
     */
    public function testIsRequestValidSuccess()
    {
        $endpoint = new TemporaryCredentials('/endpoint/uri');

        $request = $this->getMock('\\PHPoAuthProvider\\Network\\Http\\RequestData');
        $request->expects($this->once())->method('isSecure')->will($this->returnValue(true));
        $request->expects($this->once())->method('rawPost')->will($this->returnValue('Authorization: yay valid'));

        $this->assertTrue($endpoint->isRequestValid($request));
    }

    /**
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::__construct
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isRequestValid
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isConnectionSecurityValid
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isPostDataValid
     */
    public function testIsRequestValidSuccessWithoutSecureConnection()
    {
        $endpoint = new TemporaryCredentials('/endpoint/uri', false);

        $request = $this->getMock('\\PHPoAuthProvider\\Network\\Http\\RequestData');
        $request->expects($this->once())->method('rawPost')->will($this->returnValue('Authorization: yay valid'));

        $this->assertTrue($endpoint->isRequestValid($request));
    }

    /**
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::__construct
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isRequestValid
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isConnectionSecurityValid
     * @covers PHPoAuthProvider\Network\TemporaryCredentials::isPostDataValid
     */
    public function testIsRequestValidFailsWithoutSecureConnectionAndIncorrectPostData()
    {
        $endpoint = new TemporaryCredentials('/endpoint/uri', false);

        $request = $this->getMock('\\PHPoAuthProvider\\Network\\Http\\RequestData');
        $request->expects($this->once())->method('rawPost')->will($this->returnValue('Missing auth value in raw post'));

        $this->assertFalse($endpoint->isRequestValid($request));
    }
}
