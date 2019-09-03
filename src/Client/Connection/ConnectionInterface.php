<?php

namespace Soheilrt\AdobeConnectClient\Client\Connection;

use UnexpectedValueException;

/**
 * Connection Interface.
 */
interface ConnectionInterface
{
    /**
     * Send a GET request.
     *
     * @param array $queryParams Associative array to add params in URL
     *
     * @throws UnexpectedValueException if server does not respond
     *
     * @return ResponseInterface
     */
    public function get(array $queryParams = []);

    /**
     * Send a POST request.
     *
     * The request need be send as application/x-www-form-urlencoded or multipart/form-data.
     * The $postParams must accept stream file or SplFileInfo to send files.
     *
     * @param array $postParams  Associative array for the post parameters
     * @param array $queryParams Associative array to add params in URL
     *
     * @throws UnexpectedValueException if server does not respond
     *
     * @return ResponseInterface
     */
    public function post(array $postParams, array $queryParams = []);
}
