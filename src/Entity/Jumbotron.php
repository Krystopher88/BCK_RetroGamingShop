<?php

namespace App\Entity;

use App\Repository\JumbotronRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JumbotronRepository::class)]
class Jumbotron
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?PicturesJumbotron $picture_jumbotron = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?bool $is_publish = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPictureJumbotronId(): ?PicturesJumbotron
    {
        return $this->picture_jumbotron;
    }

    public function setPictureJumbotronId(?PicturesJumbotron $picture_jumbotron): static
    {
        $this->picture_jumbotron = $picture_jumbotron;

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

    public function isIsPublish(): ?bool
    {
        return $this->is_publish;
    }

    public function setIsPublish(bool $is_publish): static
    {
        $this->is_publish = $is_publish;

        return $this;
    }
}
