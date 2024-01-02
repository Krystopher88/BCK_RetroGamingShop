<?php

namespace App\Entity;

use App\Repository\PicturesProductsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PicturesProductsRepository::class)]
class PicturesProducts
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

    #[ORM\ManyToOne(inversedBy: 'picture_id')]
    private ?Products $products_id = null;

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

    public function getProductsId(): ?Products
    {
        return $this->products_id;
    }

    public function setProductsId(?Products $products_id): static
    {
        $this->products_id = $products_id;

        return $this;
    }
}
