<?php

namespace PHPoAuthProviderTest\Unit\Token;

use PHPoAuthProvider\Token\Expiring;

class ExpiringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PHPoAuthProvider\Token\Expiring::__construct
     */
    public function testConstructImplementsValidatable()
    {
        $token = new Expiring('foo');

        $this->assertInstanceOf('\\PHPoAuthProvider\\Token\\Validatable', $token);
    }

    /**
     * @covers PHPoAuthProvider\Token\Expiring::__construct
     */
    public function testConstructImplementsExpirable()
    {
        $token = new Expiring('foo');

        $this->assertInstanceOf('\\PHPoAuthProvider\\Token\\Expirable', $token);
    }

    /**
     * @covers PHPoAuthProvider\Token\Expiring::__construct
     */
    public function testConstructExtendsToken()
    {
        $token = new Expiring('foo');

        $this->assertInstanceOf('\\PHPoAuthProvider\\Token\\Token', $token);
    }

    /**
     * @covers PHPoAuthProvider\Token\Expiring::__construct
     * @covers PHPoAuthProvider\Token\Expiring::setLifetime
     */
    public function testSetLifetime()
    {
        $token = new Expiring('foo');

        $this->assertNull($token->setLifetime(1200));
    }

    /**
     * @covers PHPoAuthProvider\Token\Expiring::__construct
     * @covers PHPoAuthProvider\Token\Expiring::isValid
     */
    public function testIsValidTrue()
    {
        $token = new Expiring('foo');

        $this->assertTrue($token->isValid('foo'));
    }

    /**
     * @covers PHPoAuthProvider\Token\Expiring::__construct
     * @covers PHPoAuthProvider\Token\Expiring::isValid
     */
    public function testIsValidFalseWhenTokenDoesntMatch()
    {
        $token = new Expiring('foo');

        $this->assertFalse($token->isValid('bar'));
    }

    /**
     * @covers PHPoAuthProvider\Token\Expiring::__construct
     * @covers PHPoAuthProvider\Token\Expiring::isValid
     */
    public function testIsValidFalseWhenExpired()
    {
        $token = new Expiring('foo', new \DateTime('@1'));

        $this->assertFalse($token->isValid('foo'));
    }

    /**
     * @covers PHPoAuthProvider\Token\Expiring::__construct
     * @covers PHPoAuthProvider\Token\Expiring::isValid
     */
    public function testIsValidFalseWhenTokenDoesntMatchAndIsExpired()
    {
        $token = new Expiring('foo', new \DateTime('@1'));

        $this->assertFalse($token->isValid('bar'));
    }
}
