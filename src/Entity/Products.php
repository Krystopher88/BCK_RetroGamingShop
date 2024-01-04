<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\OneToMany(mappedBy: 'products_id', targetEntity: PicturesProducts::class, cascade: ['persist'])]
    private Collection $picture_id;

    #[ORM\ManyToOne(inversedBy: 'products_id')]
    private ?PlatformsProducts $platform = null;

    #[ORM\ManyToOne(inversedBy: 'products_id')]
    private ?CategorysProducts $category = null;

    #[ORM\ManyToOne(inversedBy: 'products_id')]
    private ?GenresProducts $genre= null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function __construct()
    {
        $this->picture_id = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * @return Collection<int, PicturesProducts>
     */
    public function getPictureId(): Collection
    {
        return $this->picture_id;
    }

    public function addPictureId(PicturesProducts $pictureId): static
    {
        if (!$this->picture_id->contains($pictureId)) {
            $this->picture_id->add($pictureId);
            $pictureId->setProductsId($this);
        }

        return $this;
    }

    public function removePictureId(PicturesProducts $pictureId): static
    {
        if ($this->picture_id->removeElement($pictureId)) {
            // set the owning side to null (unless already changed)
            if ($pictureId->getProductsId() === $this) {
                $pictureId->setProductsId(null);
            }
        }

        return $this;
    }

    public function getPlatform(): ?PlatformsProducts
    {
        return $this->platform;
    }

    public function setPlatform(?PlatformsProducts $platform): static
    {
        $this->platform = $platform;

        return $this;
    }

    public function getCategory(): ?CategorysProducts
    {
        return $this->category;
    }

    public function setCategory(?CategorysProducts $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getGenre(): ?GenresProducts
    {
        return $this->genre;
    }

    public function setGenre(?GenresProducts $genre): static
    {
        $this->genre= $genre;

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
