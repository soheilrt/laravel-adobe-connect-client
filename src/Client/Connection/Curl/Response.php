<?php

namespace Soheilrt\AdobeConnectClient\Client\Connection\Curl;

use Soheilrt\AdobeConnectClient\Client\Connection\ResponseInterface;
use Soheilrt\AdobeConnectClient\Client\Connection\StreamInterface;
use Soheilrt\AdobeConnectClient\Client\Traits\HttpReasonPhrase;

/**
 * The server response for cURL Connection.
 */
class Response implements ResponseInterface
{
    use HttpReasonPhrase;

    /**
     * @var int The response status code
     */
    protected $statusCode = 0;

    /**
     * @var array An associative array
     */
    protected $headers = [];

    /**
     * @var StreamInterface The response body
     */
    protected $body = null;

    /**
     * Create the Response.
     *
     * @param int             $statusCode The response status code
     * @param array           $headers    Associative array as name => value. Value is an array of strings
     * @param StreamInterface $body       The response body
     */
    public function __construct($statusCode, array $headers, StreamInterface $body)
    {
        $this->statusCode = intval($statusCode);
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaderLine($name)
    {
        return implode(', ', $this->getHeader($name));
    }

    /**
     * {@inheritdoc}
     */
    public function getHeader($name)
    {
        if (isset($this->headers[$name])) {
            return $this->headers[$name];
        }
        $name = $this->normalizeString($name);

        foreach ($this->headers as $header => $value) {
            if ($this->normalizeString($header) === $name) {
                return $value;
            }
        }

        return [];
    }

    /**
     * Normalize the string to compare with others strings.
     *
     * @param string $string
     *
     * @return string
     */
    protected function normalizeString($string)
    {
        return mb_strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $string));
    }
}
