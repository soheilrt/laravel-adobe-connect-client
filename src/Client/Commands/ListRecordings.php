<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Entities\SCORecord;
use Soheilrt\AdobeConnectClient\Client\Helpers\SetEntityAttributes as FillObject;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;

/**
 * Provides a list of recordings (FLV and MP4) for a specified folder or SCO.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/list-recordings.html}
 */
class ListRecordings extends Command
{
    /**
     * @var int
     */
    protected $folderId;

    /**
     * @var SCORecord|mixed
     */
    protected $scoRecord;

    /**
     * @param int $folderId
     */
    public function __construct($folderId)
    {
        $this->folderId = (int) $folderId;
        $this->scoRecord = $this->getEntity('sco-record');
    }

    /**
     * {@inheritdoc}
     *
     * @return SCORecord[]
     */
    protected function process()
    {
        $response = Converter::convert(
            $this->client->doGet([
                'action'    => 'list-recordings',
                'folder-id' => $this->folderId,
                'session'   => $this->client->getSession(),
            ])
        );

        StatusValidate::validate($response['status']);

        $recordings = [];

        foreach ($response['recordings'] as $recordingAttributes) {

            $scoRecording = new $this->scoRecord();
            FillObject::setAttributes($scoRecording, $recordingAttributes);
            $recordings[] = $scoRecording;
        }

        return $recordings;
    }
}
