<?php

/**
 * Aphiria
 *
 * @link      https://www.aphiria.com
 * @copyright Copyright (C) 2020 David Young
 * @license   https://github.com/aphiria/aphiria/blob/master/LICENSE.md
 */

declare(strict_types=1);

namespace Aphiria\Net\Http;

use Aphiria\IO\Streams\IStream;

/**
 * Defines the stream HTTP body
 */
class StreamBody implements IHttpBody
{
    /** @var IStream The body content */
    protected IStream $stream;

    /**
     * @param IStream $stream The body content
     */
    public function __construct(IStream $stream)
    {
        $this->stream = $stream;
    }

    /**
     * @inheritdoc
     */
    public function __toString(): string
    {
        return $this->readAsString();
    }

    /**
     * @inheritdoc
     */
    public function getLength(): ?int
    {
        return $this->stream->getLength();
    }

    /**
     * @inheritdoc
     */
    public function readAsStream(): IStream
    {
        return $this->stream;
    }

    /**
     * @inheritdoc
     */
    public function readAsString(): string
    {
        return (string)$this->stream;
    }

    /**
     * @inheritdoc
     */
    public function writeToStream(IStream $stream): void
    {
        if ($this->stream->isSeekable()) {
            $this->stream->rewind();
        }

        $this->stream->copyToStream($stream);
    }
}
