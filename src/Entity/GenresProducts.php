<?php

namespace App\Entity;

use App\Repository\GenresProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenresProductsRepository::class)]
class GenresProducts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'genre_id', targetEntity: Products::class)]
    private Collection $products_id;

    public function __construct()
    {
        $this->products_id = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->genre;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

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
        return $this->products_id;
    }

    public function addProductsId(Products $productsId): static
    {
        if (!$this->products_id->contains($productsId)) {
            $this->products_id->add($productsId);
            $productsId->setGenre($this);
        }

        return $this;
    }

    public function removeProductsId(Products $productsId): static
    {
        if ($this->products_id->removeElement($productsId)) {
            // set the owning side to null (unless already changed)
            if ($productsId->getGenre() === $this) {
                $productsId->setGenre(null);
            }
        }

        return $this;
    }
}
