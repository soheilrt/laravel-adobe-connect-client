<?php

namespace Soheilrt\AdobeConnectClient\Client\Connection\Curl;

use Soheilrt\AdobeConnectClient\Client\Connection\StreamInterface;

/**
 * Stream for a cURL Connection.
 */
class Stream implements StreamInterface
{
    /**
     * @var string
     */
    protected $content = '';

    /**
     * Create the Stream.
     *
     * @param string $content
     */
    public function __construct($content)
    {
        $this->content = is_string($content) ? $content : '';
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->content;
    }
}
