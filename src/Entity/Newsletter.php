<?php

namespace App\Entity;

use App\Repository\NewsletterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


#[ORM\Entity(repositoryClass: NewsletterRepository::class)]
#[Vich\Uploadable]

class Newsletter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mainTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $bannerName = null;

    #[Vich\UploadableField(mapping: 'bannerNewsLetter', fileNameProperty: 'bannerName')]
    private ?string $bannerFile = null;

    #[ORM\Column(length: 255)]
    private ?string $secondaryTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $pictureSecondaryName = null;

    #[Vich\UploadableField(mapping: 'pictureNewsLetter', fileNameProperty: 'pictureSecondaryName')]
    private ?string $pictureSecondaryFile = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $secondText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thirdTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $pictureThirdName = null;

    #[Vich\UploadableField(mapping: 'pictureNewsLetter', fileNameProperty: 'pictureThirdName')]
    private ?string $pictureThirdFile = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $thirdText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fourthTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $pictureFourthName = null;

    #[Vich\UploadableField(mapping: 'pictureNewsLetter', fileNameProperty: 'pictureFourthName')]
    private ?string $pictureFourthFile = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $fourthText = null;

    #[ORM\OneToMany(mappedBy: 'newsletter_id', targetEntity: Users::class)]
    private Collection $subscriber_id;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function __construct()
    {
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

    public function getBannerName(): ?string
    {
        return $this->bannerName;
    }

    public function setBannerName(string $bannerName): static
    {
        $this->bannerName = $bannerName;

        return $this;
    }

    public function getBannerFile(): ?string
    {
        return $this->bannerFile;
    }

    public function setBannerFile(string $bannerFile): static
    {
        $this->bannerFile = $bannerFile;

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

    public function getPictureSecondaryName(): ?string
    {
        return $this->pictureSecondaryName;
    }

    public function setPictureSecondaryName(string $pictureSecondaryName): static
    {
        $this->pictureSecondaryName = $pictureSecondaryName;

        return $this;
    }

    public function getPictureSecondaryFile(): ?string
    {
        return $this->pictureSecondaryFile;
    }

    public function setPictureSecondaryFile(string $pictureSecondaryFile): static
    {
        $this->pictureSecondaryFile = $pictureSecondaryFile;

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

    public function getPictureFourthName(): ?string
    {
        return $this->pictureFourthName;
    }

    public function setPictureFourthName(string $pictureFourthName): static
    {
        $this->pictureFourthName = $pictureFourthName;

        return $this;
    }

    public function getPictureFourthFile(): ?string
    {
        return $this->pictureFourthFile;
    }

    public function setPictureFourthFile(string $pictureFourthFile): static
    {
        $this->pictureFourthFile = $pictureFourthFile;

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

    public function getPictureThirdName(): ?string
    {
        return $this->pictureThirdName;
    }

    public function setPictureThirdName(string $pictureThirdName): static
    {
        $this->pictureThirdName = $pictureThirdName;

        return $this;
    }

    public function getPictureThirdFile(): ?string
    {
        return $this->pictureThirdFile;
    }

    public function setPictureThirdFile(string $pictureThirdFile): static
    {
        $this->pictureThirdFile = $pictureThirdFile;

        return $this;
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
