<?php

namespace App\Entity;

use App\Repository\BidsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BidsRepository::class)
 */
class Bids
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bids")
     * @ORM\JoinColumn(nullable=false)
     */
    private $who;

    /**
     * @ORM\Column(type="integer")
     */
    private $how_much;

    /**
     * @ORM\ManyToOne(targetEntity=Items::class, inversedBy="bids")
     * @ORM\JoinColumn(nullable=false)
     */
    private $item;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWho(): ?User
    {
        return $this->who;
    }

    public function setWho(?User $who): self
    {
        $this->who = $who;

        return $this;
    }

    public function getHowMuch(): ?int
    {
        return $this->how_much;
    }

    public function setHowMuch(int $how_much): self
    {
        $this->how_much = $how_much;

        return $this;
    }

    public function getItem(): ?Items
    {
        return $this->item;
    }

    public function setItem(?Items $item): self
    {
        $this->item = $item;

        return $this;
    }
}
