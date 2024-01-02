<?php

namespace App\Entity;

use App\Repository\CategorysProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorysProductsRepository::class)]
class CategorysProducts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'category_id', targetEntity: Products::class)]
    private Collection $products_id;

    public function __construct()
    {
        $this->products_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

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
            $productsId->setCategoryId($this);
        }

        return $this;
    }

    public function removeProductsId(Products $productsId): static
    {
        if ($this->products_id->removeElement($productsId)) {
            // set the owning side to null (unless already changed)
            if ($productsId->getCategoryId() === $this) {
                $productsId->setCategoryId(null);
            }
        }

        return $this;
    }
}
