<?php

namespace Soheilrt\AdobeConnectClient\Client\Traits;

use ReflectionException;
use ReflectionMethod;
use Soheilrt\AdobeConnectClient\Client\Helpers\StringCaseTransform as SCT;

trait Setter
{
    /**
     * store properties which has not property in parent class.
     */
    protected $attributes = [];

    /**
     * magic getter function for attributes that don't exist or inaccessible.
     *
     * @param $name
     *
     * @throws ReflectionException
     * @return mixed|null
     */
    public function __get($name)
    {
        if ($this->hasGetter($name) && !$this->methodHasRequiredParameter($this->getQualifiedGetterMethodName($name))) {
            return $this->{$this->getQualifiedGetterMethodName($name)}();
        }
        if ($this->hasProperty($name)) {
            return $this->{$name};
        }

        $QualifiedAttributeName = $this->getQualifiedAttributeName($name);

        return isset($this->attributes[$QualifiedAttributeName]) ? $this->attributes[$QualifiedAttributeName] : null;
    }

    /**
     * magic setter function for attributes that don't exist or inaccessible.
     *
     * @param $name
     * @param $value
     *
     * @return static
     */
    public function __set($name, $value)
    {
        $setter = $this->getQualifiedSetterMethodName($name);
        if (method_exists($this, $setter)) {
            $this->$setter($value);

            return $this;
        } else {
            $this->attributes[$this->getQualifiedAttributeName($name)] = $value;

            return $this;
        }
    }

    /**
     * Determine if function has getter method.
     *
     * @param $name
     *
     * @return bool
     */
    private function hasGetter($name)
    {
        return method_exists($this, $this->getQualifiedGetterMethodName($name));
    }

    /**
     * Return Getter Attribute Qualified Getter Name.
     *
     * @param $name
     *
     * @return string
     */
    private function getQualifiedGetterMethodName($name)
    {
        return 'get' . SCT::toUpperCamelCase($name);
    }

    /**
     * determine if asked method has any required parameters
     *
     * @param $method
     *
     * @throws ReflectionException
     * @return bool
     */
    private function methodHasRequiredParameter($method)
    {
        return (new ReflectionMethod($this, $method))->getNumberOfRequiredParameters() > 0;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    private function hasProperty($name)
    {
        return property_exists($this, $name);
    }

    /**
     * cast attribute name to qualified hyphen name.
     *
     * @param $name
     *
     * @return string
     */
    private function getQualifiedAttributeName($name)
    {
        return SCT::toCamelCase($name);
    }

    /**
     * Return Setter Method Attribute Qualified Name.
     *
     * @param string $name
     *
     * @return string
     */
    private function getQualifiedSetterMethodName($name)
    {
        return 'set' . SCT::toUpperCamelCase($name);
    }
}
