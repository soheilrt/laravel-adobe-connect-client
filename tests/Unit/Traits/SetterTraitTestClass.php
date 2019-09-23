<?php


namespace Soheilrt\AdobeConnectClient\Tests\Unit\Traits;


use Soheilrt\AdobeConnectClient\Client\Traits\Setter;

class SetterTraitTestClass
{
    use Setter;

    private $privateProperty='private property';

    public function __construct()
    {
        $this->{$this->getQualifiedAttributeName('property_attribute')}='attribute value';
    }

    public function getPropertyGetter():string
    {
        return 'getter value';
    }

}