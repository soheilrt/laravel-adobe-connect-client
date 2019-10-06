<?php


namespace Soheilrt\AdobeConnectClient\Client\Traits;


trait Fillable
{
    use Setter;

    /**
     * Mass assigment attributes
     *
     * @param array $attributes
     *
     * @return static
     */
    public function fill(array $attributes)
    {
        foreach ($attributes as $name=>$value){
            $this->__set($name,$value);
        }
        return $this;
    }
}