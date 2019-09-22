<?php

namespace Soheilrt\AdobeConnectClient\Client\Converter;

use InvalidArgumentException;
use Soheilrt\AdobeConnectClient\Client\Connection\ResponseInterface;
use Soheilrt\AdobeConnectClient\Client\Helpers\StringCaseTransform as SCT;

class ConverterXML implements ConverterInterface
{
    /**
     * {@inheritdoc}
     */
    public static function convert(ResponseInterface $response): array
    {
        $xml = simplexml_load_string($response->getBody());

        if ($xml === false) {
            throw new InvalidArgumentException('The response body needs be a valid XML');
        }

        $result = [];

        foreach ($xml as $element) {
            // If it has attributes it's an element
            if (!empty($element->attributes())) {
                $result[$element->getName()] = static::normalize(json_decode(json_encode($element), true));
                continue;
            }

            // if it doesn't have attributes it is a collection
            $elementName = SCT::toCamelCase($element->getName());
            $result[$elementName] = [];

            foreach ($element->children() as $elementChild) {
                $result[$elementName][] = static::normalize(json_decode(json_encode($elementChild), true));
            }
        }

        return $result;
    }

    /**
     * Recursive transform the array.
     *
     * @param array $arr The array piece
     *
     * @return array
     */
    protected static function normalize($arr): array
    {
        $ret = [];

        if (isset($arr['@attributes'])) {
            $arr = array_merge($arr, $arr['@attributes']);
            unset($arr['@attributes']);
        }

        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                $value = static::normalize($value);
            }
            $ret[SCT::toCamelCase($key)] = $value;
        }

        return $ret;
    }
}
