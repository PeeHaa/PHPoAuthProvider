<?php

namespace PHPoAuthProviderTest\Unit\Network;

class BaseEndpointTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PHPoAuthProvider\Network\BaseEndpoint::__construct
     */
    public function testConstruct()
    {
        $endpoint = $this->getMockForAbstractClass(
            '\\PHPoAuthProvider\\Network\\BaseEndpoint',
            [
                '/endpoint/uri',
                false,
            ]
        );

        $this->assertInstanceOf('\\PHPoAuthProvider\\Network\\BaseEndpoint', $endpoint);
    }

    /**
     * @covers PHPoAuthProvider\Network\BaseEndpoint::__construct
     * @covers PHPoAuthProvider\Network\BaseEndpoint::getUri
     */
    public function testGetUri()
    {
        $endpoint = $this->getMockForAbstractClass(
            '\\PHPoAuthProvider\\Network\\BaseEndpoint',
            [
                '/endpoint/uri',
                false,
            ]
        );

        $this->assertSame('/endpoint/uri', $endpoint->getUri());
    }
}
