<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ShelfRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShelfRepository::class)]
#[ApiResource]
class Shelf
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: ShelfQueue::class, mappedBy: 'shelf', cascade: ['persist'])]
    private Collection $shelfQueues;

    public function __construct()
    {
        $this->shelfQueues = new ArrayCollection();
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

    /**
     * @return Collection<int, ShelfQueue>
     */
    public function getShelfQueues(): Collection
    {
        return $this->shelfQueues;
    }

    public function addShelfQueue(ShelfQueue $shelfQueue): static
    {
        if (!$this->shelfQueues->contains($shelfQueue)) {
            $this->shelfQueues->add($shelfQueue);
            $shelfQueue->setShelf($this);
        }

        return $this;
    }

    public function removeShelfQueue(ShelfQueue $shelfQueue): static
    {
        if ($this->shelfQueues->removeElement($shelfQueue)) {
            // set the owning side to null (unless already changed)
            if ($shelfQueue->getShelf() === $this) {
                $shelfQueue->setShelf(null);
            }
        }

        return $this;
    }
}
