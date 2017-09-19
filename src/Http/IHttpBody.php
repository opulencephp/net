<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2017 David Young
 * @license   https://github.com/opulencephp/net/blob/master/LICENSE.md
 */

namespace Opulence\Net\Http;

use Opulence\IO\Streams\IStream;
use RuntimeException;

/**
 * Defines the interface for all HTTP message bodies to implement
 */
interface IHttpBody
{
    /**
     * Reads the HTTP body as a string
     *
     * @return string The string
     */
    public function __toString() : string;

    /**
     * Reads the HTTP body as a stream
     *
     * @return IStream The stream
     * @throws RuntimeException Thrown if there was an error reading as a stream
     */
    public function readAsStream() : IStream;

    /**
     * Reads the HTTP body as a string
     *
     * @return string The string
     */
    public function readAsString() : string;

    /**
     * Writes the HTTP body to a stream
     *
     * @param IStream $stream The stream to write to
     * @throws RuntimeException Thrown if there was an error writing to the stream
     */
    public function writeToStream(IStream $stream) : void;
}