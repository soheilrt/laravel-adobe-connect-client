<?php

namespace Soheilrt\AdobeConnectClient\Client\Abstracts;

/**
 * Adobe Connect's types constants to Content.
 *
 * See the common elements in {@link https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html#type}
 *
 * @todo Check if this is useful
 */
abstract class Content
{
    /**
     * An archived copy of a live Adobe Connect meeting or presentation.
     *
     * @var string
     */
    const ARCHIVE = 'archive';

    /**
     * A piece of content uploaded as an attachment.
     *
     * @var string
     */
    const ATTACHMENT = 'attachment';

    /**
     * A piece of multimedia content created with Macromedia Authorware from Adobe.
     *
     * @var string
     */
    const AUTHORWARE = 'authorware';

    /**
     * A demo or movie authored in Adobe Captivate.
     *
     * @var string
     */
    const CAPTIVATE = 'captivate';

    /**
     * A curriculum, including courses, presentations, and other content.
     *
     * @var string
     */
    const CURRICULUM = 'curriculum';

    /**
     * An external training that can be added to a curriculum.
     *
     * @var string
     */
    const EXTERNAL_EVENT = 'external-event';

    /**
     * A media file in the FLV file format.
     *
     * @var string
     */
    const FLV = 'flv';

    /**
     * An image, for example, in GIF or JPEG format.
     *
     * @var string
     */
    const IMAGE = 'image';

    /**
     * An Adobe Connect meeting.
     *
     * @var string
     */
    const MEETING = 'meeting';

    /**
     * A presentation.
     *
     * @var string
     */
    const PRESENTATION = 'presentation';

    /**
     * A SWF file.
     *
     * @var string
     */
    const SWF = 'swf';
}
