<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $UserName = null;

    #[ORM\Column(length: 80)]
    private ?string $Password = null;

    #[ORM\Column(length: 80)]
    private ?string $UserEmail = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $CreatedAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $UpdatedAt = null;

    #[ORM\Column]
    private ?bool $IsVerifyed = null;

    #[ORM\Column]
    private ?bool $IsAdmin = null;

    #[ORM\Column]
    private ?bool $isSuperUser = null;

    #[ORM\Column]
    private ?bool $hasOnlineShop = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->UserName;
    }

    public function setUserName(string $UserName): static
    {
        $this->UserName = $UserName;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): static
    {
        $this->Password = $Password;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->UserEmail;
    }

    public function setUserEmail(string $UserEmail): static
    {
        $this->UserEmail = $UserEmail;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): static
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $UpdatedAt): static
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }

    public function isVerifyed(): ?bool
    {
        return $this->IsVerifyed;
    }

    public function setIsVerifyed(bool $IsVerifyed): static
    {
        $this->IsVerifyed = $IsVerifyed;

        return $this;
    }

    public function isAdmin(): ?bool
    {
        return $this->IsAdmin;
    }

    public function setIsAdmin(bool $IsAdmin): static
    {
        $this->IsAdmin = $IsAdmin;

        return $this;
    }

    public function isSuperUser(): ?bool
    {
        return $this->isSuperUser;
    }

    public function setIsSuperUser(bool $isSuperUser): static
    {
        $this->isSuperUser = $isSuperUser;

        return $this;
    }

    public function hasOnlineShop(): ?bool
    {
        return $this->hasOnlineShop;
    }

    public function setHasOnlineShop(bool $hasOnlineShop): static
    {
        $this->hasOnlineShop = $hasOnlineShop;

        return $this;
    }
}
