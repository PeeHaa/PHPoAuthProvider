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
     * @covers PHPoAuthProvider\Token\Expiring::isExpired
     */
    public function testIsValidTrue()
    {
        $token = new Expiring('foo');

        $this->assertTrue($token->isValid('foo'));
    }

    /**
     * @covers PHPoAuthProvider\Token\Expiring::__construct
     * @covers PHPoAuthProvider\Token\Expiring::setLifetime
     * @covers PHPoAuthProvider\Token\Expiring::isValid
     * @covers PHPoAuthProvider\Token\Expiring::isExpired
     */
    public function testIsValidTrueWithExpandedLifetime()
    {
        $created = new \DateTime('now');
        $created->sub(new \DateInterval('PT1H'));

        $token = new Expiring('foo', $created);
        $token->setLifetime(3660); // 1 hour and 1 minute

        $this->assertTrue($token->isValid('foo'));
    }

    /**
     * @covers PHPoAuthProvider\Token\Expiring::__construct
     * @covers PHPoAuthProvider\Token\Expiring::isValid
     * @covers PHPoAuthProvider\Token\Expiring::isExpired
     */
    public function testIsValidFalseWhenTokenDoesntMatch()
    {
        $token = new Expiring('foo');

        $this->assertFalse($token->isValid('bar'));
    }

    /**
     * @covers PHPoAuthProvider\Token\Expiring::__construct
     * @covers PHPoAuthProvider\Token\Expiring::isValid
     * @covers PHPoAuthProvider\Token\Expiring::isExpired
     */
    public function testIsValidFalseWhenExpired()
    {
        $token = new Expiring('foo', new \DateTime('@1'));

        $this->assertFalse($token->isValid('foo'));
    }

    /**
     * @covers PHPoAuthProvider\Token\Expiring::__construct
     * @covers PHPoAuthProvider\Token\Expiring::isValid
     * @covers PHPoAuthProvider\Token\Expiring::isExpired
     */
    public function testIsValidFalseWhenTokenDoesntMatchAndIsExpired()
    {
        $token = new Expiring('foo', new \DateTime('@1'));

        $this->assertFalse($token->isValid('bar'));
    }
}
