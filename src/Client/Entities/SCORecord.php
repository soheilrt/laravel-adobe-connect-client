<?php

namespace Soheilrt\AdobeConnectClient\Client\Entities;

use DateInterval;
use DateTimeImmutable;
use Exception;
use InvalidArgumentException;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;
use Soheilrt\AdobeConnectClient\Client\Traits\PropertyCaller;

/**
 * The recording archive from a SCO.
 *
 * @property int|string|mixed        $sco_id
 * @property int|string|mixed        $source_sco_id
 * @property int|string|mixed        $folder_id
 * @property int|string|mixed        $display_seq
 * @property int|string|mixed        $job_id
 * @property int|string|mixed        $account_id
 * @property int|string|mixed        $encoder_service_job_progress
 * @property int|string|mixed        $no_of_downloads
 * @property int|string|mixed        $file_name
 * @property string|mixed            $type
 * @property string|mixed            $icon
 * @property string|mixed            $job_status
 * @property string|mixed            $name
 * @property string|mixed            $url_path
 * @property bool|string|mixed       $is_folder
 * @property DateTimeImmutable|mixed $date_begin
 * @property DateTimeImmutable|mixed $date_end
 * @property DateTimeImmutable|mixed $date_created
 * @property DateTimeImmutable|mixed $date_modified
 * @property DateInterval|mixed      $duration
 *
 * @method int|string|mixed getScoId()
 * @method int|string|mixed getSourceScoId()
 * @method int|string|mixed getFolderId()
 * @method int|string|mixed getDisplaySeq()
 * @method int|string|mixed getJobId()
 * @method int|string|mixed getAccountId()
 * @method int|string|mixed getEncoderServiceJobProgress()
 * @method int|string|mixed getNoOfDownloads()
 * @method int|string|mixed getFileName()
 * @method string|mixed getType()
 * @method string|mixed getIcon()
 * @method string|mixed getJobStatus()
 * @method string|mixed getName()
 * @method string|mixed getUrlPath()
 * @method bool|string|mixed getIsFolder()
 * @method DateTimeImmutable|mixed getDateBegin()
 * @method DateTimeImmutable|mixed getDateEnd()
 * @method DateTimeImmutable|mixed getDateCreated()
 * @method DateTimeImmutable|mixed getDateModified()
 * @method DateInterval|mixed getDuration()
 *
 * @method int|string|mixed setScoId($value)
 * @method int|string|mixed setSourceScoId($value)
 * @method int|string|mixed setFolderId($value)
 * @method int|string|mixed setDisplaySeq($value)
 * @method int|string|mixed setJobId($value)
 * @method int|string|mixed setAccountId($value)
 * @method int|string|mixed setEncoderServiceJobProgress($value)
 * @method int|string|mixed setNoOfDownloads($value)
 * @method int|string|mixed setFileName($value)
 * @method string|mixed setType($value)
 * @method string|mixed setIcon($value)
 * @method string|mixed setJobStatus($value)
 * @method string|mixed setName($value)
 * @method string|mixed setUrlPath($value)
 */
class SCORecord
{
    use PropertyCaller;

    /**
     * Set if is Folder.
     *
     * @param bool $isFolder
     *
     * @return void
     */
    public function setIsFolder($isFolder): void
    {
        $this->attributes['isFolder'] = VT::toBool($isFolder);
    }

    /**
     * Set the Begin date.
     *
     * @param string|DateTimeImmutable $dateBegin
     *
     * @throws Exception
     */
    public function setDateBegin($dateBegin): void
    {
        $this->attributes['dateBegin'] = VT::toDateTimeImmutable($dateBegin);
    }

    /**
     * Set the End date.
     *
     * @param string|DateTimeImmutable $dateEnd
     *
     * @throws Exception
     */
    public function setDateEnd($dateEnd): void
    {
        $this->attributes['dateEnd'] = VT::toDateTimeImmutable($dateEnd);
    }

    /**
     * Set the Created date.
     *
     * @param string|DateTimeImmutable $dateCreated
     *
     * @throws Exception
     */
    public function setDateCreated($dateCreated): void
    {
        $this->attributes['dateCreated'] = VT::toDateTimeImmutable($dateCreated);
    }

    /**
     * Set the Modified date.
     *
     * @param string|DateTimeImmutable $dateModified
     *
     * @throws Exception
     */
    public function setDateModified($dateModified): void
    {
        $this->attributes['dateModified'] = VT::toDateTimeImmutable($dateModified);
    }

    /**
     * Set the Duration.
     *
     * @param DateInterval|string $duration String in format hh:mm:ss
     *
     * @throws InvalidArgumentException
     */
    public function setDuration($duration): void
    {
        if (is_string($duration)) {
            $duration = $this->timeStringToDateInterval($duration);
        }
        $this->attributes['duration'] = $duration;
    }

    /**
     * Converts the time duration string into a \DateInterval.
     *
     * @param string $timeString A string like hh:mm:ss
     *
     * @throws InvalidArgumentException
     *
     * @return DateInterval
     */
    protected function timeStringToDateInterval($timeString): ?DateInterval
    {
        try {
            return new DateInterval(
                preg_replace(
                    '/(\d{2}):(\d{2}):(\d{2}).*/',
                    'PT$1H$2M$3S',
                    $timeString
                )
            );
        } catch (Exception $e) {
            throw new InvalidArgumentException('Timestring is not a valid interval');
        }
    }
}
