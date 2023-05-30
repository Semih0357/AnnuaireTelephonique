<?php

namespace App\Entity;

use App\Repository\PhoneNumberRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhoneNumberRepository::class)]
class PhoneNumber
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $number = null;

    #[ORM\ManyToOne(inversedBy: 'phoneNumbers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Contact $contact = null;

    #[ORM\ManyToOne(inversedBy: 'phoneNumbers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PhoneType $phoneType = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getPhoneType(): ?PhoneType
    {
        return $this->phoneType;
    }

    public function setPhoneType(?PhoneType $phoneType): self
    {
        $this->phoneType = $phoneType;

        return $this;
    }
}
