<?php

namespace App\Entity;

use App\Repository\NewsletterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsletterRepository::class)]
class Newsletter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mainTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $secondaryTitle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $secondText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thirdTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $thirdText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fourthTitle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $fourthText = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?BannerNewsletter $banner = null;

    #[ORM\OneToMany(mappedBy: 'newsletter_id', targetEntity: PicturesNewsletter::class)]
    private Collection $pictures_id;

    #[ORM\OneToMany(mappedBy: 'newsletter_id', targetEntity: Users::class)]
    private Collection $subscriber_id;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function __construct()
    {
        $this->pictures_id = new ArrayCollection();
        $this->subscriber_id = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainTitle(): ?string
    {
        return $this->mainTitle;
    }

    public function setMainTitle(string $mainTitle): static
    {
        $this->mainTitle = $mainTitle;

        return $this;
    }

    public function getSecondaryTitle(): ?string
    {
        return $this->secondaryTitle;
    }

    public function setSecondaryTitle(string $secondaryTitle): static
    {
        $this->secondaryTitle = $secondaryTitle;

        return $this;
    }

    public function getSecondText(): ?string
    {
        return $this->secondText;
    }

    public function setSecondText(string $secondText): static
    {
        $this->secondText = $secondText;

        return $this;
    }

    public function getThirdTitle(): ?string
    {
        return $this->thirdTitle;
    }

    public function setThirdTitle(?string $thirdTitle): static
    {
        $this->thirdTitle = $thirdTitle;

        return $this;
    }

    public function getThirdText(): ?string
    {
        return $this->thirdText;
    }

    public function setThirdText(?string $thirdText): static
    {
        $this->thirdText = $thirdText;

        return $this;
    }

    public function getFourthTitle(): ?string
    {
        return $this->fourthTitle;
    }

    public function setFourthTitle(?string $fourthTitle): static
    {
        $this->fourthTitle = $fourthTitle;

        return $this;
    }

    public function getFourthText(): ?string
    {
        return $this->fourthText;
    }

    public function setFourthText(string $fourthText): static
    {
        $this->fourthText = $fourthText;

        return $this;
    }

    public function getBannerId(): ?BannerNewsletter
    {
        return $this->banner;
    }

    public function setBannerId(?BannerNewsletter $banner): static
    {
        $this->banner = $banner;

        return $this;
    }

    /**
     * @return Collection<int, PicturesNewsletter>
     */
    public function getPicturesId(): Collection
    {
        return $this->pictures_id;
    }

    public function addPicturesId(PicturesNewsletter $picturesId): static
    {
        if (!$this->pictures_id->contains($picturesId)) {
            $this->pictures_id->add($picturesId);
            $picturesId->setNewsletterId($this);
        }

        return $this;
    }

    public function removePicturesId(PicturesNewsletter $picturesId): static
    {
        if ($this->pictures_id->removeElement($picturesId)) {
            // set the owning side to null (unless already changed)
            if ($picturesId->getNewsletterId() === $this) {
                $picturesId->setNewsletterId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getSubscriberId(): Collection
    {
        return $this->subscriber_id;
    }

    public function addSubscriberId(Users $subscriberId): static
    {
        if (!$this->subscriber_id->contains($subscriberId)) {
            $this->subscriber_id->add($subscriberId);
            $subscriberId->setNewsletterId($this);
        }

        return $this;
    }

    public function removeSubscriberId(Users $subscriberId): static
    {
        if ($this->subscriber_id->removeElement($subscriberId)) {
            // set the owning side to null (unless already changed)
            if ($subscriberId->getNewsletterId() === $this) {
                $subscriberId->setNewsletterId(null);
            }
        }

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
