<?php


namespace Soheilrt\AdobeConnectClient\Facades;


use Illuminate\Support\Facades\Facade;
use \Soheilrt\AdobeConnectClient\Client\Entities;

/**
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\Permission setAclId($value)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\Permission setPermissionId($value)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\Permission setPrincipalId($value)
 *
 */
class Permission extends Facade
{
    /**
     * Special permission for Meeting.
     *
     * This Constant is used in the principal-id parameter with the others MEETING_* constants.
     *
     * @var string
     */
    public const MEETING_PRINCIPAL_PUBLIC_ACCESS = Entities\Permission::MEETING_PRINCIPAL_PUBLIC_ACCESS;

    /**
     * Special permission for Meeting.
     *
     * Need set principal-id parameter with Permission::MEETING_PRINCIPAL_PUBLIC_ACCESS
     *
     * The meeting is public, and anyone who has the URL for the meeting can enter the room.
     *
     * @var string
     */
    public const MEETING_ANYONE_WITH_URL = Entities\Permission::MEETING_ANYONE_WITH_URL;

    /**
     * Special permission for Meeting.
     *
     * Need set principal-id parameter with Permission::MEETING_PRINCIPAL_PUBLIC_ACCESS
     *
     * The meeting is protected and only registered users and accepted guests can enter the room.
     *
     * @var string
     */
    public const MEETING_PROTECTED = Entities\Permission::MEETING_PROTECTED;

    /**
     * Special permission for Meeting.
     *
     * Need set principal-id parameter with Permission::MEETING_PRINCIPAL_PUBLIC_ACCESS
     *
     * The meeting is private and only registered users and participants can enter the room.
     *
     * @var string
     */
    public const MEETING_PRIVATE = Entities\Permission::MEETING_PRIVATE;

    /**
     * Special permission for Recording.
     *
     * The recording is public.
     *
     * @var string
     */
    public const RECORDING_PUBLIC = Entities\Permission::RECORDING_PUBLIC;

    /**
     * The principal can view, but cannot modify, the SCO.
     * The principal can take a course, attend a meeting as participant, or view a folder’s content.
     *
     * @var string
     */
    public const PRINCIPAL_VIEW = Entities\Permission::PRINCIPAL_VIEW;

    /**
     * Available for meetings only.
     *
     * The principal is host of a meeting and can create the meeting or act as presenter,
     * even without view permission on the meeting’s parent folder.
     *
     * @var string
     */
    public const PRINCIPAL_HOST = Entities\Permission::PRINCIPAL_HOST;

    /**
     * Available for meetings only.
     *
     * The principal is presenter of a meeting and can present content, share a screen,
     * send text messages, moderate questions, create text notes, broadcast audio and video,
     * and push content from web links.
     *
     * @var string
     */
    public const PRINCIPAL_MINI_HOST = Entities\Permission::PRINCIPAL_MINI_HOST;

    /**
     * Available for meetings only.
     *
     * The principal does not have participant, presenter or host permission to attend the meeting.
     * If a user is already attending a live meeting, the user is not removed from the meeting until
     * the session times out.
     *
     * @var string
     */
    public const PRINCIPAL_REMOVE = Entities\Permission::PRINCIPAL_REMOVE;

    /**
     * Available for SCOs other than meetings.
     *
     * The principal can publish or update the SCO.
     * The publish permission includes view and allows the principal to view reports related to the SCO.
     * On a folder, publish does not allow the principal to create new subfolders or set permissions.
     *
     * @var string
     */
    public const PRINCIPAL_PUBLISH = Entities\Permission::PRINCIPAL_PUBLISH;

    /**
     * Available for SCOs other than meetings or courses.
     *
     * The principal can view, delete, move, edit, or set permissions on the SCO.
     * On a folder, the principal can create subfolders or view reports on folder content.
     *
     * @var string
     */
    public const PRINCIPAL_MANAGE = Entities\Permission::PRINCIPAL_MANAGE;

    /**
     * Available for SCOs other than meetings.
     *
     * The principal cannot view, access, or manage the SCO.
     *
     * @var string
     */
    public const PRINCIPAL_DENIED = Entities\Permission::PRINCIPAL_DENIED;

    protected static function getFacadeAccessor()
    {
        return 'adobe-connect.permission';
    }
}
