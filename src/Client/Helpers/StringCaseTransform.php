<?php

namespace Soheilrt\AdobeConnectClient\Client\Helpers;

/**
 * Converts string into Camel Case and vice-versa.
 */
abstract class StringCaseTransform
{
    /**
     * Converts the Camel Case to Hyphen.
     *
     * @param string $term
     *
     * @return string
     */
    public static function toHyphen($term)
    {
        return static::camelCaseTransform(static::toCamelCase($term), '-');
    }

    /**
     * Converts the Camel Case to a string replace with the letter.
     *
     * @param string $term   The string to convert
     * @param string $letter The letter to replace with
     *
     * @return string
     */
    protected static function camelCaseTransform($term, $letter)
    {
        return mb_strtolower(preg_replace('/([A-Z])/', $letter . '$1', $term));
    }

    /**
     * Converts any string to camelCase.
     *
     * @param string $term
     *
     * @return string
     */
    public static function toCamelCase($term)
    {
        $term = preg_replace_callback(
            '/[\s_-](\w)/',
            function ($matches) {
                return mb_strtoupper($matches[1]);
            },
            $term
        );
        $term[0] = mb_strtolower($term[0]);

        return $term;
    }

    /**
     * Converts the Camel Case to Dash.
     *
     * @param string $term
     *
     * @return string
     */
    public static function toDash($term)
    {
        return static::camelCaseTransform(static::toCamelCase($term), '_');
    }

    /**
     * Converts the Camel Case to Space.
     *
     * @param string $term
     *
     * @return string
     */
    public static function toSpace($term)
    {
        return static::camelCaseTransform(static::toCamelCase($term), ' ');
    }

    /**
     * Converts any string to CamelCase.
     *
     * @param string $term
     *
     * @return string
     */
    public static function toUpperCamelCase($term)
    {
        $term = static::toCamelCase($term);
        $term[0] = mb_strtoupper($term[0]);

        return $term;
    }
}
