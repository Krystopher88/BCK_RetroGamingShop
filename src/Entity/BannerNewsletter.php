<?php

namespace App\Entity;

use App\Repository\BannerNewsletterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BannerNewsletterRepository::class)]
class BannerNewsletter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $bannerName = null;

    #[ORM\Column(length: 255)]
    private ?string $bannerFile = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBannerName(): ?string
    {
        return $this->bannerName;
    }

    public function setBannerName(string $bannerName): static
    {
        $this->bannerName = $bannerName;

        return $this;
    }

    public function getBannerFile(): ?string
    {
        return $this->bannerFile;
    }

    public function setBannerFile(string $bannerFile): static
    {
        $this->bannerFile = $bannerFile;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }
}
