<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use InvalidArgumentException;
use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Client\Filter;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;
use SplFileInfo;

/**
 * Uploads a file to the server and then builds the file, if necessary.
 *
 * Create a new File SCO or update if exists in the folder (a SCO Meeting) and upload the file.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/sco-upload.html}
 *
 * The filename (filePath) needs the extension for Adobe Connect purpose.
 *
 * The Adobe Connect API Documentation says to call the sco-info and analyse the status info
 * to determine if upload is ready, but the sco-info does not inform the status attribute.
 *
 * So we analyse the files array wich is returned by the sco-upload, but this info is deprecated.
 */
class ScoUpload extends Command
{
    /**
     * @var int
     */
    protected $folderId;

    /**
     * @var string
     */
    protected $resourceName;

    /**
     * @var SplFileInfo|resource
     */
    protected $file;

    /**
     * @var SCO|mixed
     */
    protected $sco;

    /**
     * @param int                  $folderId The Folder (SCO ID) owned the file
     * @param string               $resourceName
     * @param SplFileInfo|resource $file
     *
     * @throws InvalidArgumentException
     */
    public function __construct($folderId, $resourceName, $file)
    {
        if (!is_resource($file) && !($file instanceof SplFileInfo)) {
            throw new InvalidArgumentException('File need be a valid resource or a SplFileInfo object');
        }
        $this->folderId = (int) $folderId;
        $this->resourceName = (string) $resourceName;
        $this->file = $file;
        $this->sco = $this->getEntity('sco');
    }

    /**
     * {@inheritdoc}
     *
     * @return int|null The Content SCO ID or null if fail
     */
    protected function process()
    {
        $sco = $this->getSco();

        $response = Converter::convert(
            $this->client->doPost(
                [
                    'file' => $this->file,
                ],
                [
                    'action'  => 'sco-upload',
                    'sco-id'  => $sco->getScoId(),
                    'session' => $this->client->getSession(),
                ]
            )
        );
        StatusValidate::validate($response['status']);

        return empty($response['files']) ? null : $sco->getScoId();
    }

    /**
     * Get the SCO content if exists or create one.
     *
     * @return SCO
     */
    protected function getSco()
    {
        $scos = $this->client->scoContents(
            $this->folderId,
            Filter::instance()
                ->equals('folderId', $this->folderId)
                ->equals('name', $this->resourceName)
                ->equals('type', SCO::TYPE_CONTENT)
        );

        return empty($scos) ? $this->createSco() : reset($scos);
    }

    /**
     * Create a SCO content.
     *
     * @return SCO
     */
    protected function createSco()
    {
        return $this->client->scoCreate(
            SCO::instance()
                ->setType(SCO::TYPE_CONTENT)
                ->setFolderId($this->folderId)
                ->setName($this->resourceName)
        );
    }
}
