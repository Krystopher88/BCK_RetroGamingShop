<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reference = null;

    #[ORM\ManyToOne(inversedBy: 'coupon_id')]
    private ?Coupons $coupon = null;

    #[ORM\ManyToOne(inversedBy: 'order_id')]
    private ?Users $user = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'orders_id')]
    private ?OrdersDetails $ordersDetails = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getCoupon(): ?Coupons
    {
        return $this->coupon;
    }

    public function setCoupon(?Coupons $coupon): static
    {
        $this->coupon = $coupon;

        return $this;
    }

    public function getUserId(): ?Users
    {
        return $this->user;
    }

    public function setUserId(?Users $user): static
    {
        $this->user = $user;

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

    public function getOrdersDetailsId(): ?OrdersDetails
    {
        return $this->ordersDetails;
    }

    public function setOrdersDetailsId(?OrdersDetails $ordersDetails): static
    {
        $this->ordersDetails = $ordersDetails;

        return $this;
    }
}
