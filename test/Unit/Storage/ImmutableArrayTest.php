<?php

namespace PHPoAuthProviderTest\Storage;

use PHPoAuthProvider\Storage\ImmutableArray;

class ImmutableArrayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers PHPoAuthProvider\Storage\ImmutableArray::__construct
     */
    public function testConstructCorrectInterface()
    {
        $array = new ImmutableArray();

        $this->assertInstanceOf('\\PHPoAuthProvider\\Storage\\ImmutableKeyValue', $array);
    }

    /**
     * @covers PHPoAuthProvider\Storage\ImmutableArray::__construct
     */
    public function testConstructCorrectInstance()
    {
        $array = new ImmutableArray();

        $this->assertInstanceOf('\\PHPoAuthProvider\\Storage\\ImmutableArray', $array);
    }

    /**
     * @covers PHPoAuthProvider\Storage\ImmutableArray::__construct
     * @covers PHPoAuthProvider\Storage\ImmutableArray::isKeyValid
     */
    public function testIsKeyValidInvalid()
    {
        $array = new ImmutableArray();

        $this->assertFalse($array->isKeyValid('foo'));
    }

    /**
     * @covers PHPoAuthProvider\Storage\ImmutableArray::__construct
     * @covers PHPoAuthProvider\Storage\ImmutableArray::isKeyValid
     */
    public function testIsKeyValidValid()
    {
        $array = new ImmutableArray(['foo' => 'bar']);

        $this->assertTrue($array->isKeyValid('foo'));
    }

    /**
     * @covers PHPoAuthProvider\Storage\ImmutableArray::__construct
     * @covers PHPoAuthProvider\Storage\ImmutableArray::get
     */
    public function testGetExists()
    {
        $array = new ImmutableArray(['foo' => 'bar']);

        $this->assertSame('bar', $array->get('foo'));
    }

    /**
     * @covers PHPoAuthProvider\Storage\ImmutableArray::__construct
     * @covers PHPoAuthProvider\Storage\ImmutableArray::get
     */
    public function testGetNotExistsDefaultValue()
    {
        $array = new ImmutableArray();

        $this->assertNull($array->get('foo'));
    }

    /**
     * @covers PHPoAuthProvider\Storage\ImmutableArray::__construct
     * @covers PHPoAuthProvider\Storage\ImmutableArray::get
     */
    public function testGetNotExistsCustomDefaultValue()
    {
        $array = new ImmutableArray();

        $this->assertSame('bar', $array->get('foo', 'bar'));
    }
}
