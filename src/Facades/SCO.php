<?php


namespace Soheilrt\AdobeConnectClient\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setDisabled($value)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setMeetingPodsLayoutsLocked($value)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setUpdateLinkedItem($value)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setIcon($icon)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setLang($lang)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setType($type)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setVersion($version)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setDescription($description)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setName($name)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setUrlPath($path)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setDateCreated($date)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setDateModified($modified)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setDateBegin($dateBegin)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setDateEnd($dateEnd)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setMaxRetires($maxRetries)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setScoId($scoId)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setSourceScoId($sourceScoId)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setDisplaySeq($displaySeq)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setFolderId($folderID)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setAccountId($accountId)
 *
 */
class SCO extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'adobe-connect.sco';
    }
}
