<?php
/**
 * Exception which gets thrown when trying to use an invalid storage (i.e. missing data file / db)
 *
 * PHP version 5.4
 *
 * @category   PHPoAuthProvider
 * @package    Storage
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2013 Pieter Hordijk
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    1.0.0
 */
namespace PHPoAuthProvider\Storage;

/**
 * Exception which gets thrown when trying to use an invalid storage
 *
 * @category   PHPoAuthProvider
 * @package    Storage
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
class InvalidStorageException extends \Exception
{
}
