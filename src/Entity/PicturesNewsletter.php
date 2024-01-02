<?php

namespace App\Entity;

use App\Repository\PicturesNewsletterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PicturesNewsletterRepository::class)]
class PicturesNewsletter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pictureName = null;

    #[ORM\Column(length: 255)]
    private ?string $pictureFile = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'pictures_id')]
    private ?Newsletter $newsletter = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPictureName(): ?string
    {
        return $this->pictureName;
    }

    public function setPictureName(string $pictureName): static
    {
        $this->pictureName = $pictureName;

        return $this;
    }

    public function getPictureFile(): ?string
    {
        return $this->pictureFile;
    }

    public function setPictureFile(string $pictureFile): static
    {
        $this->pictureFile = $pictureFile;

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

    public function getNewsletterId(): ?Newsletter
    {
        return $this->newsletter;
    }

    public function setNewsletterId(?Newsletter $newsletter): static
    {
        $this->newsletter = $newsletter;

        return $this;
    }
}
