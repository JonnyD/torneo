<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     shortName="Tournament",
 *     collectionOperations={
 *         "get",
 *         "post"={"access_control"="is_granted('ROLE_USER')"}
 *     },
 *     itemOperations={
 *         "get",
 *         "put"={"access_control"="is_granted('ROLE_USER')"},
 *         "delete"={"access_control"="is_granted('ROLE_USER')"}
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\GlobalTournamentRepository")
 */
class GlobalTournament extends Tournament
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scheduled_start_date", type="datetime", nullable=true)
     */
    private $scheduledStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scheduled_end_date", type="datetime", nullable=true)
     */
    private $scheduledEndDate;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="timezone", type="string", nullable=false)
     */
    private $timezone;

    /**
     * @var bool
     *
     * @ORM\Column(name="public", type="boolean", nullable=true)
     */
    private $public;

    /**
     * @var bool
     *
     * @ORM\Column(name="online", type="boolean", nullable=true)
     */
    private $online;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", nullable=true)
     */
    private $logo;

    /**
     * @var bool
     *
     * @ORM\Column(name="registration_enabled", type="boolean", nullable=true)
     */
    private $registrationEnabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registration_opening_datetime", type="datetime", nullable=true)
     */
    private $registrationOpeningDatetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registration_closing_datetime", type="datetime", nullable=true)
     */
    private $registrationClosingDatetime;

    /**
     * @var string
     *
     * @ORM\Column(name="organization", type="string", nullable=true)
     */
    private $organization;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", nullable=true)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="discord", type="string", nullable=true)
     */
    private $discord;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", nullable=true)
     */
    private $website;

    /**
     * @var string
     *@Assert\Length(
     *      max = 1500
     * )
     * @ORM\Column(name="description", type="string", nullable=true)
     */
    private $description;

    /**
     * @var string
     * @Assert\Length(
     *      max = 10000
     * )
     * @ORM\Column(name="rules", type="string", nullable=true)
     */
    private $rules;

    /**
     * @var string
     * @Assert\Length(
     *      max = 1500
     * )
     * @ORM\Column(name="prize", type="string", nullable=true)
     */
    private $prize;

    /**
     * @var bool
     *
     * @ORM\Column(name="match_reported_enabled", type="boolean", nullable=true)
     */
    private $matchReportedEnabled;

    /**
     * @var string
     *
     * @ORM\Column(name="registration_request_message", type="string", nullable=true)
     */
    private $registrationRequestMessage;

    /**
     * @var bool
     *
     * @ORM\Column(name="check_in_enabled", type="boolean", nullable=true)
     */
    private $checkInEnabled;

    /**
     * @var bool
     *
     * @ORM\Column(name="check_in_participant_enabled", type="boolean", nullable=true)
     */
    private $checkInParticipantEnabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="check_in_participant_start_datetime", type="datetime", nullable=true)
     */
    private $checkInParticipantStartDatetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="check_in_participant_end_datetime", type="datetime", nullable=true)
     */
    private $checkInParticipantEndDatetime;

    /**
     * @var bool
     *
     * @ORM\Column(name="archived", type="boolean", nullable=true)
     */
    private $archived;

    /**
     * @var string
     *
     * @ORM\Column(name="registration_acceptance_message", type="string", nullable=true)
     */
    private $registrationAcceptanceMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="registratiomn_refusal_message", type="string", nullable=true)
     */
    private $registrationRefusalMessage;

    /**
     * @var string
     *
     * @Assert\NotBlank
     *
     * @ORM\Column(name="participant_type", type="string", nullable=false)
     */
    private $participantType;

    /**
     * @var int
     *
     * @ORM\Column(name="team_size_min", type="integer", nullable=true)
     */
    private $teamSizeMin;

    /**
     * @var int
     *
     * @ORM\Column(name="team_size_max", type="integer", nullable=true)
     */
    private $teamSizeMax;

    /**
     * @var string $code
     *
     * @ORM\Column(name="code", type="string", nullable=true)
     */
    private $code;

    /**
     * @var int $number
     *
     * @ORM\Column(name="size", type="integer", nullable=false)
     */
    private $size;

    /**
     * @return \DAteTime
     */
    public function getScheduledStartDate(): ?\DAteTime
    {
        return $this->scheduledStartDate;
    }

    /**
     * @param \DAteTime $scheduledStartDate
     */
    public function setScheduledStartDate(\DateTime $scheduledStartDate): void
    {
        $this->scheduledStartDate = $scheduledStartDate;
    }

    /**
     * @return \DAteTime
     */
    public function getScheduledEndDate(): ?\DateTime
    {
        return $this->scheduledEndDate;
    }

    /**
     * @param \DateTime $scheduledEndDate
     */
    public function setScheduledEndDate(\DateTime $scheduledEndDate): void
    {
        $this->scheduledEndDate = $scheduledEndDate;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     */
    public function setTimezone(string $timezone): void
    {
        $this->timezone = $timezone;
    }

    /**
     * @return bool
     */
    public function isPublic(): bool
    {
        return $this->public;
    }

    /**
     * @param bool $public
     */
    public function setPublic(bool $public): void
    {
        $this->public = $public;
    }

    /**
     * @return bool
     */
    public function isOnline(): bool
    {
        return $this->online;
    }

    /**
     * @param bool $online
     */
    public function setOnline(bool $online): void
    {
        $this->online = $online;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return bool
     */
    public function isRegistrationEnabled(): bool
    {
        return $this->registrationEnabled;
    }

    /**
     * @param bool $registrationEnabled
     */
    public function setRegistrationEnabled(bool $registrationEnabled): void
    {
        $this->registrationEnabled = $registrationEnabled;
    }

    /**
     * @return \DateTime
     */
    public function getRegistrationOpeningDatetime(): \DateTime
    {
        return $this->registrationOpeningDatetime;
    }

    /**
     * @param \DateTime $registrationOpeningDatetime
     */
    public function setRegistrationOpeningDatetime(\DateTime $registrationOpeningDatetime): void
    {
        $this->registrationOpeningDatetime = $registrationOpeningDatetime;
    }

    /**
     * @return \DateTime
     */
    public function getRegistrationClosingDatetime(): ?\DateTime
    {
        return $this->registrationClosingDatetime;
    }

    /**
     * @param \DateTime $registrationClosingDatetime
     */
    public function setRegistrationClosingDatetime(\DateTime $registrationClosingDatetime): void
    {
        $this->registrationClosingDatetime = $registrationClosingDatetime;
    }

    /**
     * @return string
     */
    public function getOrganization(): string
    {
        return $this->organization;
    }

    /**
     * @param string $organization
     */
    public function setOrganization(string $organization): void
    {
        $this->organization = $organization;
    }

    /**
     * @return string
     */
    public function getContact(): string
    {
        return $this->contact;
    }

    /**
     * @param string $contact
     */
    public function setContact(string $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return string
     */
    public function getDiscord(): string
    {
        return $this->discord;
    }

    /**
     * @param string $discord
     */
    public function setDiscord(string $discord): void
    {
        $this->discord = $discord;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getRules(): string
    {
        return $this->rules;
    }

    /**
     * @param string $rules
     */
    public function setRules(string $rules): void
    {
        $this->rules = $rules;
    }

    /**
     * @return string
     */
    public function getPrize(): string
    {
        return $this->prize;
    }

    /**
     * @param string $prize
     */
    public function setPrize(string $prize): void
    {
        $this->prize = $prize;
    }

    /**
     * @return bool
     */
    public function isMatchReportedEnabled(): bool
    {
        return $this->matchReportedEnabled;
    }

    /**
     * @param bool $matchReportedEnabled
     */
    public function setMatchReportedEnabled(bool $matchReportedEnabled): void
    {
        $this->matchReportedEnabled = $matchReportedEnabled;
    }

    /**
     * @return string
     */
    public function getRegistrationRequestMessage(): string
    {
        return $this->registrationRequestMessage;
    }

    /**
     * @param string $registrationRequestMessage
     */
    public function setRegistrationRequestMessage(string $registrationRequestMessage): void
    {
        $this->registrationRequestMessage = $registrationRequestMessage;
    }

    /**
     * @return bool
     */
    public function isCheckInEnabled(): bool
    {
        return $this->checkInEnabled;
    }

    /**
     * @param bool $checkInEnabled
     */
    public function setCheckInEnabled(bool $checkInEnabled): void
    {
        $this->checkInEnabled = $checkInEnabled;
    }

    /**
     * @return bool
     */
    public function isCheckInParticipantEnabled(): ?bool
    {
        return $this->checkInParticipantEnabled;
    }

    /**
     * @param bool $checkInParticipantEnabled
     */
    public function setCheckInParticipantEnabled(bool $checkInParticipantEnabled): void
    {
        $this->checkInParticipantEnabled = $checkInParticipantEnabled;
    }

    /**
     * @return \DateTime
     */
    public function getCheckInParticipantStartDatetime(): \DateTime
    {
        return $this->checkInParticipantStartDatetime;
    }

    /**
     * @param \DateTime $checkInParticipantStartDatetime
     */
    public function setCheckInParticipantStartDatetime(\DateTime $checkInParticipantStartDatetime): void
    {
        $this->checkInParticipantStartDatetime = $checkInParticipantStartDatetime;
    }

    /**
     * @return \DateTime
     */
    public function getCheckInParticipantEndDatetime(): \DateTime
    {
        return $this->checkInParticipantEndDatetime;
    }

    /**
     * @param \DateTime $checkInParticipantEndDatetime
     */
    public function setCheckInParticipantEndDatetime(\DateTime $checkInParticipantEndDatetime): void
    {
        $this->checkInParticipantEndDatetime = $checkInParticipantEndDatetime;
    }

    /**
     * @return bool
     */
    public function isArchived(): bool
    {
        return $this->archived;
    }

    /**
     * @param bool $archived
     */
    public function setArchived(bool $archived): void
    {
        $this->archived = $archived;
    }

    /**
     * @return string
     */
    public function getRegistrationAcceptanceMessage(): string
    {
        return $this->registrationAcceptanceMessage;
    }

    /**
     * @param string $registrationAcceptanceMessage
     */
    public function setRegistrationAcceptanceMessage(string $registrationAcceptanceMessage): void
    {
        $this->registrationAcceptanceMessage = $registrationAcceptanceMessage;
    }

    /**
     * @return string
     */
    public function getRegistrationRefusalMessage(): string
    {
        return $this->registrationRefusalMessage;
    }

    /**
     * @param string $registrationRefusalMessage
     */
    public function setRegistrationRefusalMessage(string $registrationRefusalMessage): void
    {
        $this->registrationRefusalMessage = $registrationRefusalMessage;
    }

    /**
     * @return string
     */
    public function getParticipantType(): string
    {
        return $this->participantType;
    }

    /**
     * @param string $participantType
     */
    public function setParticipantType(string $participantType): void
    {
        $this->participantType = $participantType;
    }

    /**
     * @return int
     */
    public function getTeamSizeMin(): int
    {
        return $this->teamSizeMin;
    }

    /**
     * @param int $teamSizeMin
     */
    public function setTeamSizeMin(int $teamSizeMin): void
    {
        $this->teamSizeMin = $teamSizeMin;
    }

    /**
     * @return int
     */
    public function getTeamSizeMax(): int
    {
        return $this->teamSizeMax;
    }

    /**
     * @param int $teamSizeMax
     */
    public function setTeamSizeMax(int $teamSizeMax): void
    {
        $this->teamSizeMax = $teamSizeMax;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }
}