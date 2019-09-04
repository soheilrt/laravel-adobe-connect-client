<?php

namespace Soheilrt\AdobeConnectClient\Client\Abstracts;

use BadMethodCallException;
use DomainException;
use InvalidArgumentException;
use Soheilrt\AdobeConnectClient\Client\Client;
use Soheilrt\AdobeConnectClient\Client\Exceptions\InvalidException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoDataException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\TooMuchDataException;
use UnexpectedValueException;

/**
 * The Commands base class is an abstraction to Web Service actions.
 *
 * Need set the Client dependency to execute the command.
 * For a list of actions see {@link https://helpx.adobe.com/adobe-connect/webservices/topics/action-reference.html}
 *
 * @todo Create all items
 */
abstract class Command
{
    /**
     * @var Client|static
     */
    protected $client;

    /**
     * @param string $entity
     *
     * @return string|array|null
     */
    public function getEntity($entity = null)
    {
        $entities = config('adobeConnect.entities');
        if ($entity) {
            return $entities[$entity] ?? null;
        }
        return $entities;
    }

    /**
     * @param static $client
     *
     * @return Command
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Executes the command and return a value.
     *
     * @throws NoAccessException
     * @throws NoDataException
     * @throws TooMuchDataException
     * @throws UnexpectedValueException
     * @throws InvalidArgumentException
     * @throws DomainException
     * @throws BadMethodCallException
     *
     * @throws InvalidException
     * @return mixed
     */
    public function execute()
    {
        if (!($this->client instanceof Client)) {
            throw new BadMethodCallException('Needs the Client to execute a Command');
        }

        return $this->process();
    }

    /**
     * Process the command and return a value.
     *
     * @throws NoAccessException
     * @throws NoDataException
     * @throws TooMuchDataException
     * @throws UnexpectedValueException
     * @throws InvalidArgumentException
     * @throws DomainException
     *
     * @throws InvalidException
     * @return mixed
     */
    abstract protected function process();
}
