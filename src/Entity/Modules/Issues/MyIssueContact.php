<?php

namespace App\Entity\Modules\Issues;

use App\Entity\Interfaces\EntityInterface;
use App\Entity\Interfaces\SoftDeletableEntityInterface;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Modules\Issues\MyIssueContactRepository")
 */
class MyIssueContact implements SoftDeletableEntityInterface, EntityInterface
{

    const FIELD_NAME_DELETED  = "deleted";
    const FIELD_NAME_RESOLVED = "resolved";

    /**
     * @var int $id
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $information
     * @ORM\Column(type="text", nullable=true)
     */
    private $information;

    /**
     * @var null|string $icon
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    private $icon;

    /**
     * @var DateTime $date
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @var bool $deleted
     * @ORM\Column(type="boolean")
     */
    private $deleted = 0;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Modules\Issues\MyIssue", inversedBy="issueContact")
     */
    private $myIssue;

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getInformation(): ?string {
        return $this->information;
    }

    /**
     * @param string|null $information
     */
    public function setInformation(?string $information): void {
        $this->information = $information;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string {
        return $this->icon;
    }

    /**
     * @param string|null $icon
     */
    public function setIcon(?string $icon): void {
        $this->icon = $icon;
    }

    /**
     * @return DateTime
     */
    public function getDate(): ?DateTime {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(?DateTime $date): void {
        $this->date = $date;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     */
    public function setDeleted(bool $deleted): void {
        $this->deleted = $deleted;
    }

    public function getIssue(): ?MyIssue
    {
        return $this->myIssue;
    }

    public function setIssue(?MyIssue $myIssue): self
    {
        $this->myIssue = $myIssue;

        return $this;
    }

}
