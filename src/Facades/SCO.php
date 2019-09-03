<?php


namespace Soheilrt\AdobeConnectClient\Facades;


use DateTimeImmutable;
use Illuminate\Support\Facades\Facade;

/**
 * @method static bool|string|mixed              getDisabled
 * @method static bool|string|mixed              getMeetingPodsLayoutsLocked
 * @method static bool|string|mixed              getUpdateLinkedItem
 * @method static string|mixed                   getIcon
 * @method static string|mixed                   getLang
 * @method static string|mixed                   getType
 * @method static string|mixed                   getVersion
 * @method static string|mixed                   getDescription
 * @method static string|mixed                   getName
 * @method static string|mixed                   getUrlPath
 * @method static DateTimeImmutable|string|mixed getDateCreated
 * @method static DateTimeImmutable|string|mixed getDateModified
 * @method static DateTimeImmutable|string|mixed getDateBegin
 * @method static DateTimeImmutable|string|mixed getDateEnd
 * @method static int|string|mixed               getMaxRetires
 * @method static int|string|mixed               getScoId
 * @method static int|string|mixed               getSourceScoId
 * @method static int|string|mixed               getDisplaySeq
 * @method static int|string|mixed               getFolderId
 * @method static int|string|mixed               getAccountId
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setDisabled
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setMeetingPodsLayoutsLocked
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setUpdateLinkedItem
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setIcon($icon)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setLang($lang)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setType$($type)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setVersion($version)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setDescription($description)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setName($name)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setUrlPath($path)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setDateCreated($date)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setDateModified($modified)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setDateBegin($dateBegin)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setDateEnd($dateEnd)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setMaxRetires($maxRetries)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setScoId($scoId)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setSourceScoId($sourceScoId)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO                          setDisplaySeq($displaySeq)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO  setFolderId($folderID)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\SCO setAccountId($accountId)
 *
 * @mixin \Soheilrt\AdobeConnectClient\Client\Entities\SCO
 */
class SCO extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SCO';
    }
}
