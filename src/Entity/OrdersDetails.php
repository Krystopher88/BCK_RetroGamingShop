<?php

namespace App\Entity;

use App\Repository\OrdersDetailsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersDetailsRepository::class)]
class OrdersDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'ordersDetails_id', targetEntity: Orders::class)]
    private Collection $orders_id;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?float $totalPrice = null;

    public function __construct()
    {
        $this->orders_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Orders>
     */
    public function getOrdersId(): Collection
    {
        return $this->orders_id;
    }

    public function addOrdersId(Orders $ordersId): static
    {
        if (!$this->orders_id->contains($ordersId)) {
            $this->orders_id->add($ordersId);
            $ordersId->setOrdersDetailsId($this);
        }

        return $this;
    }

    public function removeOrdersId(Orders $ordersId): static
    {
        if ($this->orders_id->removeElement($ordersId)) {
            // set the owning side to null (unless already changed)
            if ($ordersId->getOrdersDetailsId() === $this) {
                $ordersId->setOrdersDetailsId(null);
            }
        }

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): static
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }
}
