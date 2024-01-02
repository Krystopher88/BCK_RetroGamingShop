<?php

namespace App\Entity;

use App\Repository\PlatformsProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatformsProductsRepository::class)]
class PlatformsProducts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $platform = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'platform_id', targetEntity: Products::class)]
    private Collection $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(string $platform): static
    {
        $this->platform = $platform;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Products>
     */
    public function getProductsId(): Collection
    {
        return $this->products;
    }

    public function addProductsId(Products $productsId): static
    {
        if (!$this->products->contains($productsId)) {
            $this->products->add($productsId);
            $productsId->setPlatformId($this);
        }

        return $this;
    }

    public function removeProductsId(Products $productsId): static
    {
        if ($this->products->removeElement($productsId)) {
            // set the owning side to null (unless already changed)
            if ($productsId->getPlatformId() === $this) {
                $productsId->setPlatformId(null);
            }
        }

        return $this;
    }
}
