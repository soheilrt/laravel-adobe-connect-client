<?php

namespace Soheilrt\AdobeConnectClient\Client\Connection\Curl;

use CURLFile;
use InvalidArgumentException;
use Soheilrt\AdobeConnectClient\Client\Connection\ConnectionInterface;
use SplFileInfo;
use UnexpectedValueException;

/**
 * Connection using cURL.
 */
class Connection implements ConnectionInterface
{
    /**
     * @var array Associative array of Options
     */
    protected $config = [];

    /**
     * @var string The host URL
     */
    protected $host = '';

    /**
     * @var array [string => string[]] Simplify headers generation in cURL call
     */
    protected $headers = [];

    /**
     * Create the instance using a host URL and config.
     *
     * @param string $host   The Host URL
     * @param array  $config An array to config cURL. Use CURLOPT_* as index
     *
     * @throws InvalidArgumentException if $host is not a valid URL with scheme
     */
    public function __construct($host, array $config = [])
    {
        $this->setHost($host);
        $this->setConfig($config);
    }

    /**
     * Set the Host URL.
     *
     * @param string $host The Host URL
     *
     * @throws InvalidArgumentException if $host is not a valid URL with scheme
     */
    public function setHost($host)
    {
        $host = filter_var(trim($host, " ?/\n\t"), FILTER_SANITIZE_URL);

        if (!filter_var($host, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException('Connection Host must be a valid URL with scheme');
        }
        $this->host = strpos($host, '/api/xml') === false ? $host . '/api/xml' : $host;
    }

    /**
     * Set the cURL config.
     *
     * @param array $config Associative array. Items as Option => Value
     */
    protected function setConfig(array $config)
    {
        $defaults = [
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
        ];
        $this->config = $config + $defaults;

        // Always need this configurations
        $this->config[CURLOPT_RETURNTRANSFER] = true;
        $this->config[CURLOPT_FOLLOWLOCATION] = true;
        $this->config[CURLOPT_HEADERFUNCTION] = [$this, 'extractHeader'];
    }

    /**
     * {@inheritdoc}
     */
    public function get(array $queryParams = [])
    {
        $ch = $this->prepareCurl($queryParams);
        $body = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($body === false) {
            $exception = new UnexpectedValueException(curl_error($ch), curl_errno($ch));
            curl_close($ch);

            throw $exception;
        }
        curl_close($ch);

        return new Response($statusCode, $this->headers, new Stream($body));
    }

    /**
     * Reset the temporary headers and prepare the cURL.
     *
     * @param array $queryParams Associative array to add params in URL
     *
     * @return resource A cURL resource
     */
    protected function prepareCurl(array $queryParams = [])
    {
        $this->headers = [];

        $ch = curl_init($this->getFullURL($queryParams));
        curl_setopt_array($ch, $this->config);

        return $ch;
    }

    /**
     * Get the full URL with query parameters.
     *
     * @param array $queryParams Associative array to add params in URL
     *
     * @return string
     */
    protected function getFullURL(array $queryParams)
    {
        return empty($queryParams)
            ? $this->host
            : $this->host . '?' . http_build_query($queryParams, '', '&');
    }

    /**
     * {@inheritdoc}
     */
    public function post(array $postParams, array $queryParams = [])
    {
        $ch = $this->prepareCurl($queryParams);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->convertFileParams($postParams));
        $body = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($body === false) {
            $exception = new UnexpectedValueException(curl_error($ch), curl_errno($ch));
            curl_close($ch);

            throw $exception;
        }
        curl_close($ch);

        return new Response($statusCode, $this->headers, new Stream($body));
    }

    /**
     * Convert stream file and SplFileInfo in CURLFile.
     *
     * @param array $params Associative array of parameters
     *
     * @return array
     */
    protected function convertFileParams(array $params)
    {
        foreach ($params as $param => $value) {
            $fileInfo = $this->fileInfo($value);

            if (empty($fileInfo)) {
                continue;
            }
            $params[$param] = new CURLFile($fileInfo['path'], $fileInfo['mime']);
        }

        return $params;
    }

    /**
     * Get the filepath and mime-type from a file.
     *
     * If it's a stream file or \SplFileInfo returns an object with path and mime.
     *
     * @param resource|SplFileInfo $item A stream file or SplFileInfo object
     *
     * @return array|null Returns null if it's not a valid stream file or SplFileInfo
     */
    protected function fileInfo($item)
    {
        if (is_resource($item)) {
            $streamMeta = stream_get_meta_data($item);

            if ($streamMeta['wrapper_type'] !== 'plainfile') {
                return null;
            }
            $path = $streamMeta['uri'];
            $mime = mime_content_type($path);
        } elseif ($item instanceof SplFileInfo and $item->getType() === 'file') {
            $path = $item->getPathname();
            $mime = mime_content_type($path);
        } else {
            return null;
        }

        return [
            'path' => $path,
            'mime' => $mime,
        ];
    }

    /**
     * Extract header line and store it to posterior use.
     *
     * This method is called by option CURLOPT_HEADERFUNCTION.
     *
     * @param resource $curlResource
     * @param string   $headerLine
     *
     * @return int The size of header line
     */
    protected function extractHeader($curlResource, $headerLine)
    {
        $headerSize = strlen($headerLine);
        $headerLine = trim($headerLine, " \t\n");

        if (empty($headerLine)) {
            return $headerSize;
        }

        $pos = strpos($headerLine, ':');

        if ($pos === false) {
            return $headerSize;
        }

        $header = trim(substr($headerLine, 0, $pos));

        if (!in_array($header, ['Set-Cookie', 'Content-Type'])) {
            return $headerSize;
        }
        $this->headers[$header] = [trim(substr($headerLine, $pos + 1))];

        return $headerSize;
    }
}
