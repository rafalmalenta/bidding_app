<?php

namespace App\Entity;

use App\Repository\ItemsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemsRepository::class)
 */
class Items
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minimum_price;

    /**
     * @ORM\Column(type="integer")
     */
    private $starting_price;

    /**
     * @ORM\Column(type="date")
     */
    private $finish_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $buy_now_price;


    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $describtion;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getMinimumPrice(): ?int
    {
        return $this->minimum_price;
    }

    public function setMinimumPrice(?int $minimum_price): self
    {
        $this->minimum_price = $minimum_price;

        return $this;
    }

    public function getStartingPrice(): ?int
    {
        return $this->starting_price;
    }

    public function setStartingPrice(int $starting_price): self
    {
        $this->starting_price = $starting_price;

        return $this;
    }

    public function getFinishDate(): ?\DateTimeInterface
    {
        return $this->finish_date;
    }

    public function setFinishDate(\DateTimeInterface $finish_date): self
    {
        $this->finish_date = $finish_date;

        return $this;
    }

    public function getBuyNowPrice(): ?int
    {
        return $this->buy_now_price;
    }

    public function setBuyNowPrice(?int $buy_now_price): self
    {
        $this->buy_now_price = $buy_now_price;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescribtion(): ?string
    {
        return $this->describtion;
    }

    public function setDescribtion(?string $describtion): self
    {
        $this->describtion = $describtion;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
