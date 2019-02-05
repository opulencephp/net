<?php

/*
 * Aphiria
 *
 * @link      https://www.aphiria.com
 * @copyright Copyright (c) 2019 David Young
 * @license   https://github.com/aphiria/net/blob/master/LICENSE.md
 */

namespace Aphiria\Net\Http\ContentNegotiation\MediaTypeFormatters;

/**
 * Defines the base class for media type formatters to implement
 */
abstract class MediaTypeFormatter implements IMediaTypeFormatter
{
    /**
     * @inheritdoc
     */
    public function getDefaultEncoding(): string
    {
        return $this->getSupportedEncodings()[0];
    }

    /**
     * @inheritdoc
     */
    public function getDefaultMediaType(): string
    {
        return $this->getSupportedMediaTypes()[0];
    }

    /**
     * Checks whether or not an encoding is supported
     *
     * @param string $encoding The encoding to check
     * @return bool True if the encoding is supported, otherwise false
     */
    protected function encodingIsSupported(string $encoding): bool
    {
        $lowercaseSupportedEncodings = array_map('strtolower', $this->getSupportedEncodings());
        $lowercaseEncoding = \strtolower($encoding);

        return \in_array($lowercaseEncoding, $lowercaseSupportedEncodings, true);
    }
}