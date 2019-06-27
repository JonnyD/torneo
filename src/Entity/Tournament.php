<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TournamentRepository")
 */
class Tournament
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fullName;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $scheduledStartDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $scheduledEndDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $timezone;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $public;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $online;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $registrationEnabled;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $registrationOpeningDatetime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $organization;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $discord;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rules;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prize;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $matchReportedEnabled;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $registrationRequestMessage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $checkInEnabled;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $checkInParticipationEnabled;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $checkInParticipantStartDatetime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $checkInParticipantEndDatetime;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $archived;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $registrationAcceptanceMessage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $registrationRefusalMessage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $participantType;

    /**
     * @ORM\Column(type="integer")
     */
    private $teamSizeMin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $teamSizeMax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game", inversedBy="tournaments")
     */
    private $game;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getScheduledStartDate(): ?\DateTimeInterface
    {
        return $this->scheduledStartDate;
    }

    public function setScheduledStartDate(?\DateTimeInterface $scheduledStartDate): self
    {
        $this->scheduledStartDate = $scheduledStartDate;

        return $this;
    }

    public function getScheduledEndDate(): ?\DateTimeInterface
    {
        return $this->scheduledEndDate;
    }

    public function setScheduledEndDate(?\DateTimeInterface $scheduledEndDate): self
    {
        $this->scheduledEndDate = $scheduledEndDate;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(?bool $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getOnline(): ?bool
    {
        return $this->online;
    }

    public function setOnline(?bool $online): self
    {
        $this->online = $online;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getRegistrationEnabled(): ?bool
    {
        return $this->registrationEnabled;
    }

    public function setRegistrationEnabled(?bool $registrationEnabled): self
    {
        $this->registrationEnabled = $registrationEnabled;

        return $this;
    }

    public function getRegistrationOpeningDatetime(): ?\DateTimeInterface
    {
        return $this->registrationOpeningDatetime;
    }

    public function setRegistrationOpeningDatetime(?\DateTimeInterface $registrationOpeningDatetime): self
    {
        $this->registrationOpeningDatetime = $registrationOpeningDatetime;

        return $this;
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }

    public function setOrganization(?string $organization): self
    {
        $this->organization = $organization;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getDiscord(): ?string
    {
        return $this->discord;
    }

    public function setDiscord(?string $discord): self
    {
        $this->discord = $discord;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRules(): ?string
    {
        return $this->rules;
    }

    public function setRules(?string $rules): self
    {
        $this->rules = $rules;

        return $this;
    }

    public function getPrize(): ?string
    {
        return $this->prize;
    }

    public function setPrize(?string $prize): self
    {
        $this->prize = $prize;

        return $this;
    }

    public function getMatchReportedEnabled(): ?bool
    {
        return $this->matchReportedEnabled;
    }

    public function setMatchReportedEnabled(?bool $matchReportedEnabled): self
    {
        $this->matchReportedEnabled = $matchReportedEnabled;

        return $this;
    }

    public function getRegistrationRequestMessage(): ?string
    {
        return $this->registrationRequestMessage;
    }

    public function setRegistrationRequestMessage(?string $registrationRequestMessage): self
    {
        $this->registrationRequestMessage = $registrationRequestMessage;

        return $this;
    }

    public function getCheckInEnabled(): ?bool
    {
        return $this->checkInEnabled;
    }

    public function setCheckInEnabled(?bool $checkInEnabled): self
    {
        $this->checkInEnabled = $checkInEnabled;

        return $this;
    }

    public function getCheckInParticipationEnabled(): ?bool
    {
        return $this->checkInParticipationEnabled;
    }

    public function setCheckInParticipationEnabled(?bool $checkInParticipationEnabled): self
    {
        $this->checkInParticipationEnabled = $checkInParticipationEnabled;

        return $this;
    }

    public function getCheckInParticipantStartDatetime(): ?\DateTimeInterface
    {
        return $this->checkInParticipantStartDatetime;
    }

    public function setCheckInParticipantStartDatetime(?\DateTimeInterface $checkInParticipantStartDatetime): self
    {
        $this->checkInParticipantStartDatetime = $checkInParticipantStartDatetime;

        return $this;
    }

    public function getCheckInParticipantEndDatetime(): ?\DateTimeInterface
    {
        return $this->checkInParticipantEndDatetime;
    }

    public function setCheckInParticipantEndDatetime(?\DateTimeInterface $checkInParticipantEndDatetime): self
    {
        $this->checkInParticipantEndDatetime = $checkInParticipantEndDatetime;

        return $this;
    }

    public function getArchived(): ?bool
    {
        return $this->archived;
    }

    public function setArchived(?bool $archived): self
    {
        $this->archived = $archived;

        return $this;
    }

    public function getRegistrationAcceptanceMessage(): ?string
    {
        return $this->registrationAcceptanceMessage;
    }

    public function setRegistrationAcceptanceMessage(?string $registrationAcceptanceMessage): self
    {
        $this->registrationAcceptanceMessage = $registrationAcceptanceMessage;

        return $this;
    }

    public function getRegistrationRefusalMessage(): ?string
    {
        return $this->registrationRefusalMessage;
    }

    public function setRegistrationRefusalMessage(?string $registrationRefusalMessage): self
    {
        $this->registrationRefusalMessage = $registrationRefusalMessage;

        return $this;
    }

    public function getParticipantType(): ?string
    {
        return $this->participantType;
    }

    public function setParticipantType(string $participantType): self
    {
        $this->participantType = $participantType;

        return $this;
    }

    public function getTeamSizeMin(): ?int
    {
        return $this->teamSizeMin;
    }

    public function setTeamSizeMin(int $teamSizeMin): self
    {
        $this->teamSizeMin = $teamSizeMin;

        return $this;
    }

    public function getTeamSizeMax(): ?int
    {
        return $this->teamSizeMax;
    }

    public function setTeamSizeMax(?int $teamSizeMax): self
    {
        $this->teamSizeMax = $teamSizeMax;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): self
    {
        $this->game = $game;

        return $this;
    }
}
