<?php

namespace PHPoAuthProviderTest\Unit\Token;

use PHPoAuthProviderTest\Mocks\Token\Token;

class TokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PHPoAuthProvider\Token\Token::__construct
     */
    public function testConstructCorrectInstance()
    {
        $token = $this->getMockForAbstractClass('\\PHPoAuthProvider\\Token\\Token', ['foo']);

        $this->assertInstanceOf('\\PHPoAuthProvider\\Token\\Token', $token);
    }

    /**
     * @covers PHPoAuthProvider\Token\Token::__construct
     */
    public function testConstructCorrectInstanceWithCustomCreationTimestamp()
    {
        $token = $this->getMockForAbstractClass('\\PHPoAuthProvider\\Token\\Token', ['foo', new \DateTime('now')]);

        $this->assertInstanceOf('\\PHPoAuthProvider\\Token\\Token', $token);
    }

    /**
     * @covers PHPoAuthProvider\Token\Token::__construct
     * @covers PHPoAuthProvider\Token\Token::doesTokenMatch
     */
    public function testDoesTokenMatchTrue()
    {
        $token = new Token('foo');

        $this->assertTrue($token->isValid('foo'));
    }

    /**
     * @covers PHPoAuthProvider\Token\Token::__construct
     * @covers PHPoAuthProvider\Token\Token::doesTokenMatch
     */
    public function testDoesTokenMatchFalseStrict()
    {
        $token = new Token('1true');

        $this->assertFalse($token->isValid(1));
    }

    /**
     * @covers PHPoAuthProvider\Token\Token::__construct
     * @covers PHPoAuthProvider\Token\Token::doesTokenMatch
     */
    public function testDoesTokenMatchFalse()
    {
        $token = new Token('foo');

        $this->assertFalse($token->isValid('bar'));
    }
}
