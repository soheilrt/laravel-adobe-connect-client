<?php

namespace Soheilrt\AdobeConnectClient\Client;

use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Helpers\StringCaseTransform as SCT;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;

/**
 * A generic Parameter class to extra parameters.
 */
class Parameter implements ArrayableInterface
{
    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * Returns a new Parameter instance.
     *
     * @return Parameter
     */
    public static function instance()
    {
        return new static();
    }

    /**
     * Add a parameter.
     *
     * @param string $parameter
     * @param mixed  $value
     *
     * @return Parameter Fluent Interface
     */
    public function set($parameter, $value)
    {
        $this->parameters[SCT::toHyphen($parameter)] = VT::toString($value);

        return $this;
    }

    /**
     * Remove a parameter.
     *
     * @param string $parameter
     *
     * @return Parameter Fluent Interface
     */
    public function remove($parameter)
    {
        $parameter = SCT::toHyphen($parameter);

        if (isset($this->parameters[$parameter])) {
            unset($this->parameters[$parameter]);
        }

        return $this;
    }

    /**
     * Retrieves all not null attributes in an associative array.
     *
     * The keys in hash style: Ex: is-member
     * The values as string
     *
     * @return string[]
     */
    public function toArray()
    {
        return $this->parameters;
    }
}
