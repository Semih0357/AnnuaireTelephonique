<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[Assert\EqualTo(propertyPath: "password", message: "Vos mots de passe ne sont pas identiques.")]
    private string $password2;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Contact::class, orphanRemoval: true)]
    private Collection $contacts;

    #[ORM\Column(nullable: true)]
    private array $roles = [];

    public function __construct()
    {
        $this->contacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPassword2(): ?string
    {
        return $this->password2;
    }

    public function setPassword2(string $password): self
    {
        $this->password2 = $password;

        return $this;
    }
     
    /**
      * @return Collection<int, Contact>
      */
     public function getContacts(): Collection
     {
         return $this->contacts;
     }

     public function addContact(Contact $contact): self
     {
         if (!$this->contacts->contains($contact)) {
             $this->contacts->add($contact);
             $contact->setUser($this);
         }

         return $this;
     }

     public function removeContact(Contact $contact): self
     {
         if ($this->contacts->removeElement($contact)) {
             // set the owning side to null (unless already changed)
             if ($contact->getUser() === $this) {
                 $contact->setUser(null);
             }
         }

         return $this;
     }

     public function getRoles(): array
     {
         return $this->roles;
     }

     public function setRoles(?array $roles): self
     {
         $this->roles = $roles;

         return $this;
     }

     /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->getId();
    }
}
