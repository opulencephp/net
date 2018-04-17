<?php

/*
 * Opulence
 *
 * @link      https://www.opulencephp.com
 * @copyright Copyright (C) 2018 David Young
 * @license   https://github.com/opulencephp/Opulence/blob/master/LICENSE.md
 */

namespace Opulence\Net\Http\Formatting\Contracts;

/**
 * Defines the float contract
 */
class FloatContract implements IContract
{
    /** @var float The float value */
    private $value;

    /**
     * @param float $value The float value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    public function getValue(): float
    {
        return $this->value;
    }
}