<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Connection\File;

use Soheilrt\AdobeConnectClient\Client\Connection\ConnectionInterface;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Response;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Stream;
use Soheilrt\AdobeConnectClient\Client\Connection\ResponseInterface;

/**
 * Mock the WS response.
 *
 * The responses are XML files in Resources folder and the routes are listed in routes.php file.
 * The routes are an array with action as key and each value is an array with resourceId => xml-file.
 * The resourceId is a sha1 from a serialize in queryParams.
 */
class Connection implements ConnectionInterface
{
    private $contentType = 'text/xml';

    private $resources = __DIR__ . '/Resources/';

    private $session = 'na9breezx3385yw9ymhhzb5p';

    private $routes = [];

    public function __construct()
    {
        $this->routes = include __DIR__ . '/routes.php';
    }

    public function getSessionString(): string
    {
        return $this->session;
    }

    /**
     * {@inheritdoc}
     */
    public function get(array $queryParams = []): ResponseInterface
    {
        $resourceFile = $this->getResourcePath($queryParams);

        return new Response(
            200,
            [
                'Content-Type' => [$this->contentType],
                'Set-Cookie'   => ["BREEZESESSION={$this->session};HttpOnly;domain=.adobeconnect.com;secure;path=/"],
            ],
            new Stream(file_get_contents($resourceFile))
        );
    }

    private function getResourcePath(array $queryParams): string
    {
        $action = $queryParams['action'];
        ksort($queryParams);
        $resourceId = sha1(serialize($queryParams));

        if (empty($this->routes[$action][$resourceId])) {
            trigger_error("Resource to {$action} with resource ID {$resourceId} not found.", E_USER_ERROR);
        }

        return $this->resources . $this->routes[$action][$resourceId] . '.xml';
    }

    /**
     * {@inheritdoc}
     */
    public function post(array $postParams, array $queryParams = []): ResponseInterface
    {
        $resourceFile = $this->getResourcePath($queryParams);

        return new Response(
            200,
            [
                'Content-Type' => ['text/xml'],
                'Set-Cookie'   => ["BREEZESESSION={$this->session};HttpOnly;domain=.adobeconnect.com;secure;path=/"],
            ],
            new Stream(file_get_contents($resourceFile))
        );
    }
}
