<?php
/**
 * Abstract class for tokens
 *
 * PHP version 5.4
 *
 * @category   PHPoAuthProvider
 * @package    Token
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2013 Pieter Hordijk
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0.0
 */
namespace PHPoAuthProvider\Token;

/**
 * Abstract class for tokens
 *
 * @category   PHPoAuthProvider
 * @package    Token
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
abstract class Token
{
    /**
     * @var string The token
     */
    private $token;

    /**
     * @var \DateTime The timestamp of creation of the token
     */
    protected $created;

    /**
     * Creates instance
     *
     * @param string    $token   The token
     * @param \DateTime $created The creation timestamp
     */
    public function __construct($token, \DateTime $created = null)
    {
        $this->token   = $token;
        $this->created = new \DateTime('now');

        if ($created !== null) {
            $this->created = $created;
        }
    }

    /**
     * Checks whether the user supplied token matches the stored token
     *
     * @param string $token The user supplied token to match
     */
    protected function doesTokenMatch($token)
    {
        return $this->token === $token;
    }
}
