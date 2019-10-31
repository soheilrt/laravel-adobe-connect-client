<?php


namespace Soheilrt\AdobeConnectClient\Facades;


use Illuminate\Support\Facades\Facade;
use \Soheilrt\AdobeConnectClient\Client\Entities;
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
    /**
     * A viewable file uploaded to the server.
     * For example, an FLV file, an HTML file, an image, a pod, and so on.
     *
     * @var string
     */
    public const TYPE_CONTENT = Entities\SCO::TYPE_CONTENT;

    /**
     * A curriculum.
     *
     * @var string
     */
    public const TYPE_CURRICULUM = Entities\SCO::TYPE_CURRICULUM;

    /**
     * An event.
     *
     * @var string
     */
    public const TYPE_EVENT = Entities\SCO::TYPE_EVENT;

    /**
     * A folder on the server’s hard disk that contains content.
     *
     * @var string
     */
    public const TYPE_FOLDER = Entities\SCO::TYPE_FOLDER;

    /**
     * A reference to another SCO. These links are used by curriculums to link to other SCOs.
     * When content is added to a curriculum, a link is created from the curriculum to the content.
     *
     * @var string
     */
    public const TYPE_LINK = Entities\SCO::TYPE_LINK;

    /**
     * An Adobe Connect meeting.
     *
     * @var string
     */
    public const TYPE_MEETING = Entities\SCO::TYPE_MEETING;

    /**
     * One occurrence of a recurring Adobe Connect meeting.
     *
     * @var string
     */
    public const TYPE_SESSION = Entities\SCO::TYPE_SESSION;

    /**
     * @uses \Soheilrt\AdobeConnectClient\Client\Entities\SCO::TYPE_TREE
     *
     * @var string
     */
    public const TYPE_TREE = Entities\SCO::TYPE_TREE;

    protected static function getFacadeAccessor()
    {
        return 'adobe-connect.sco';
    }
}
