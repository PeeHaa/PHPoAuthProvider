<?php

namespace PHPoAuthProviderTest\Unit\Token;

use PHPoAuthProvider\Token\NonExpiring;

class NonExpiringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PHPoAuthProvider\Token\NonExpiring::__construct
     */
    public function testConstructImplementsValidatable()
    {
        $token = new NonExpiring('foo');

        $this->assertInstanceOf('\\PHPoAuthProvider\\Token\\Validatable', $token);
    }

    /**
     * @covers PHPoAuthProvider\Token\NonExpiring::__construct
     */
    public function testConstructExtendsToken()
    {
        $token = new NonExpiring('foo');

        $this->assertInstanceOf('\\PHPoAuthProvider\\Token\\Token', $token);
    }

    /**
     * @covers PHPoAuthProvider\Token\NonExpiring::__construct
     * @covers PHPoAuthProvider\Token\NonExpiring::isValid
     */
    public function testIsValidTrue()
    {
        $token = new NonExpiring('foo');

        $this->assertTrue($token->isValid('foo'));
    }

    /**
     * @covers PHPoAuthProvider\Token\NonExpiring::__construct
     * @covers PHPoAuthProvider\Token\NonExpiring::isValid
     */
    public function testIsValidFalse()
    {
        $token = new NonExpiring('foo');

        $this->assertFalse($token->isValid('bar'));
    }
}
