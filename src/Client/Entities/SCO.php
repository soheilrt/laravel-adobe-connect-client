<?php

namespace Soheilrt\AdobeConnectClient\Client\Entities;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;
use Soheilrt\AdobeConnectClient\Client\Traits\Arrayable;
use Soheilrt\AdobeConnectClient\Client\Traits\Fillable;
use Soheilrt\AdobeConnectClient\Client\Traits\PropertyCaller;

/**
 * Adobe Connect SCO.
 *
 * See {@link https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html#type}
 *
 * @property bool|string|mixed              $disabled
 * @property bool|string|mixed              $meetingPodsLayoutsLocked
 * @property bool|string|mixed              $updateLinkedItem
 * @property string|mixed                   $icon
 * @property string|mixed                   $lang
 * @property string|mixed                   $type
 * @property string|mixed                   $version
 * @property string|mixed                   $description
 * @property string|mixed                   $name
 * @property string|mixed                   $url_path
 * @property DateTimeImmutable|string|mixed $date_created
 * @property DateTimeImmutable|string|mixed $date_modified
 * @property DateTimeImmutable|string|mixed $date_begin
 * @property DateTimeImmutable|string|mixed $date_end
 * @property int|string|mixed               $max_retires
 * @property int|string|mixed               $sco_id
 * @property int|string|mixed               $source_sco_id
 * @property int|string|mixed               $display_seq
 * @property int|string|mixed               $folder_id
 * @property int|string|mixed               $accountId
 *
 *
 * @method bool|string|mixed getDisabled()
 * @method bool|string|mixed getMeetingPodsLayoutsLocked()
 * @method string|mixed getIcon()
 * @method string|mixed getLang()
 * @method string|mixed getType()
 * @method string|mixed getVersion()
 * @method string|mixed getDescription()
 * @method string|mixed getName()
 * @method string|mixed getUrlPath()
 * @method DateTimeImmutable|string|mixed getDateCreated()
 * @method DateTimeImmutable|string|mixed getDateModified()
 * @method DateTimeImmutable|string|mixed getDateBegin()
 * @method DateTimeImmutable|string|mixed getDateEnd()
 * @method int|string|mixed getMaxRetires()
 * @method int|string|mixed getScoId()
 * @method int|string|mixed getSourceScoId()
 * @method int|string|mixed getDisplaySeq()
 * @method int|string|mixed getFolderId()
 * @method int|string|mixed getAccountId()
 *
 * @method SCO setIcon($value)
 * @method SCO setLang($value)
 * @method SCO setType($value)
 * @method SCO setVersion($value)
 * @method SCO setDescription($value)
 * @method SCO setName($value)
 * @method SCO setUrlPath($value)
 * @method SCO setMaxRetires($value)
 * @method SCO setScoId($value)
 * @method SCO setSourceScoId($value)
 * @method SCO setDisplaySeq($value)
 * @method SCO setFolderId($value)
 * @method SCO setAccountId($value)
 */
class SCO implements ArrayableInterface
{
    use Arrayable, PropertyCaller,Fillable;

    /**
     * A viewable file uploaded to the server.
     * For example, an FLV file, an HTML file, an image, a pod, and so on.
     *
     * @var string
     */
    public const TYPE_CONTENT = 'content';

    /**
     * A curriculum.
     *
     * @var string
     */
    public const TYPE_CURRICULUM = 'curriculum';

    /**
     * An event.
     *
     * @var string
     */
    public const TYPE_EVENT = 'event';

    /**
     * A folder on the server’s hard disk that contains content.
     *
     * @var string
     */
    public const TYPE_FOLDER = 'folder';

    /**
     * A reference to another SCO. These links are used by curriculums to link to other SCOs.
     * When content is added to a curriculum, a link is created from the curriculum to the content.
     *
     * @var string
     */
    public const TYPE_LINK = 'link';

    /**
     * An Adobe Connect meeting.
     *
     * @var string
     */
    public const TYPE_MEETING = 'meeting';

    /**
     * One occurrence of a recurring Adobe Connect meeting.
     *
     * @var string
     */
    public const TYPE_SESSION = 'session';

    /**
     * The root of a folder hierarchy. A tree’s root is treated as an independent hierarchy;
     * you can’t determine the parent folder of a tree from inside the tree.
     *
     * @var string
     */
    public const TYPE_TREE = 'tree';

    /**
     * Create a new SCO Instance.
     *
     * @return SCO
     */
    public static function instance(): SCO
    {
        return new static();
    }

    /**
     * Set the disabled status.
     *
     * @param bool $disabled
     *
     * @return SCO
     */
    public function setDisabled($disabled): SCO
    {
        $this->attributes['disabled'] = VT::toBool($disabled);

        return $this;
    }

    /**
     * Set the Created Date.
     *
     * @param DateTimeInterface|string $dateCreated
     *
     * @throws Exception
     *
     * @return SCO
     */
    public function setDateCreated($dateCreated): SCO
    {
        $this->attributes['dateCreated'] = VT::toDateTimeImmutable($dateCreated);

        return $this;
    }

    /**
     * Set the Modified Date.
     *
     * @param DateTimeInterface|string $dateModified
     *
     * @throws Exception
     *
     * @return SCO
     */
    public function setDateModified($dateModified): SCO
    {
        $this->attributes['dateModified'] = VT::toDateTimeImmutable($dateModified);

        return $this;
    }

    /**
     * Set the time Meeting begin.
     *
     * @param DateTimeInterface|string $dateBegin
     *
     * @throws Exception
     *
     * @return SCO
     */
    public function setDateBegin($dateBegin): SCO
    {
        $this->attributes['dateBegin'] = VT::toDateTimeImmutable($dateBegin);

        return $this;
    }

    /**
     * Set the time Meeting end.
     *
     * @param DateTimeInterface|string $dateEnd
     *
     * @throws Exception
     *
     * @return SCO
     */
    public function setDateEnd($dateEnd): SCO
    {
        $this->attributes['dateEnd'] = VT::toDateTimeImmutable($dateEnd);

        return $this;
    }

    /**
     * Set the Pods Layout locked status.
     *
     * @param bool $meetingPodsLayoutsLocked
     *
     * @return SCO
     */
    public function setMeetingPodsLayoutsLocked($meetingPodsLayoutsLocked): SCO
    {
        $this->attributes['meetingPodsLayoutsLocked'] = VT::toBool($meetingPodsLayoutsLocked);

        return $this;
    }

    /**
     * Set the linked item status.
     *
     * @param bool $updateLinkedItem
     *
     * @return SCO
     */
    public function setUpdateLinkedItem($updateLinkedItem): SCO
    {
        $this->attributes['updateLinkedItem'] = VT::toBool($updateLinkedItem);

        return $this;
    }

    /**
     * get the linked item status.
     *
     * @return bool
     */
    public function getUpdateLinkedItem(): bool
    {
        return $this->attributes['updateLinkedItem'] ?? false;
    }
}
