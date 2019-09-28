<?php


namespace Soheilrt\AdobeConnectClient\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * The recording archive from a SCO.
 *
 * @see \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setScoId()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setSourceScoId()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setFolderId()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setDisplaySeq()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setJobId()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setAccountId()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setEncoderServiceJobProgress()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setNoOfDownloads()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setFileName()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setType()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setIcon()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setJobStatus()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setName()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setUrlPath()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setIsFolder()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setDateBegin()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setDateEnd()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setDateCreated()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setDateModified()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord setDuration()
 * @mixin \Soheilrt\AdobeConnectClient\Client\Entities\SCORecord
 */
class SCORecord extends Facade
{
    protected static function getFacadeAccessor()
    {
        return __CLASS__;
    }
}
