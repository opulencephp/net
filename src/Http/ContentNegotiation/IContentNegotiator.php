<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2018 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

namespace Opulence\Net\Http\ContentNegotiation;

use InvalidArgumentException;
use Opulence\Net\Http\IHttpRequestMessage;

/**
 * Defines the interface for content negotiators to implement
 */
interface IContentNegotiator
{
    /**
     * Gets the list of acceptable response media types for a particular type
     *
     * @param string $type The type to check for
     * @return array The list of acceptable media types
     */
    public function getAcceptableResponseMediaTypes(string $type): array;

    /**
     * Gets the negotiation result for the request body
     *
     * @param string $type The type to negotiate
     * @param IHttpRequestMessage $request The request to negotiate with
     * @return ContentNegotiationResult The content negotiation result
     * @throws InvalidArgumentException Thrown if the Content-Type header was incorrectly formatted
     */
    public function negotiateRequestContent(string $type, IHttpRequestMessage $request): ContentNegotiationResult;

    /**
     * Gets the negotiation result for the response body
     *
     * @param string $type The type to negotiate
     * @param IHttpRequestMessage $request The request to negotiate with
     * @return ContentNegotiationResult The content negotiation result
     * @throws InvalidArgumentException Thrown if the Accept header's media types were incorrectly formatted
     */
    public function negotiateResponseContent(string $type, IHttpRequestMessage $request): ContentNegotiationResult;
}
