<?php

namespace Soheilrt\AdobeConnectClient\Client\Entities;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;
use Soheilrt\AdobeConnectClient\Client\Traits\Arrayable;
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
 */
class SCO implements ArrayableInterface
{
    use Arrayable, PropertyCaller;

    /**
     * A viewable file uploaded to the server.
     * For example, an FLV file, an HTML file, an image, a pod, and so on.
     *
     * @var string
     */
    const TYPE_CONTENT = 'content';

    /**
     * A curriculum.
     *
     * @var string
     */
    const TYPE_CURRICULUM = 'curriculum';

    /**
     * An event.
     *
     * @var string
     */
    const TYPE_EVENT = 'event';

    /**
     * A folder on the server’s hard disk that contains content.
     *
     * @var string
     */
    const TYPE_FOLDER = 'folder';

    /**
     * A reference to another SCO. These links are used by curriculums to link to other SCOs.
     * When content is added to a curriculum, a link is created from the curriculum to the content.
     *
     * @var string
     */
    const TYPE_LINK = 'link';

    /**
     * An Adobe Connect meeting.
     *
     * @var string
     */
    const TYPE_MEETING = 'meeting';

    /**
     * One occurrence of a recurring Adobe Connect meeting.
     *
     * @var string
     */
    const TYPE_SESSION = 'session';

    /**
     * The root of a folder hierarchy. A tree’s root is treated as an independent hierarchy;
     * you can’t determine the parent folder of a tree from inside the tree.
     *
     * @var string
     */
    const TYPE_TREE = 'tree';

    /**
     * Create a new SCO Instance.
     *
     * @return SCO
     */
    public static function instance()
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
    public function setDisabled($disabled)
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
    public function setDateCreated($dateCreated)
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
    public function setDateModified($dateModified)
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
    public function setDateBegin($dateBegin)
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
    public function setDateEnd($dateEnd)
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
    public function setMeetingPodsLayoutsLocked($meetingPodsLayoutsLocked)
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
    public function setUpdateLinkedItem($updateLinkedItem)
    {
        $this->attributes['updateLinkedItem'] = VT::toBool($updateLinkedItem);

        return $this;
    }

    /**
     * get the linked item status.
     *
     * @return bool
     */
    public function getUpdateLinkedItem()
    {
        return isset($this->attributes['updateLinkedItem']) ? $this->attributes['updateLinkedItem'] : false;
    }
}
