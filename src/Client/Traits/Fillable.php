<?php


namespace Soheilrt\AdobeConnectClient\Client\Traits;


trait Fillable
{
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
            $this->$name=$value;
        }
        return $this;
    }
}