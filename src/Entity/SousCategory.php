<?php

namespace App\Entity;

use App\Repository\SousCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousCategoryRepository::class)]
class SousCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'sousCategory', targetEntity: category::class)]
    private Collection $category_id;

    public function __construct()
    {
        $this->category_id = new ArrayCollection();
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
     * @return Collection<int, category>
     */
    public function getCategoryId(): Collection
    {
        return $this->category_id;
    }

    public function addCategoryId(category $categoryId): static
    {
        if (!$this->category_id->contains($categoryId)) {
            $this->category_id->add($categoryId);
            $categoryId->setSousCategory($this);
        }

        return $this;
    }

    public function removeCategoryId(category $categoryId): static
    {
        if ($this->category_id->removeElement($categoryId)) {
            // set the owning side to null (unless already changed)
            if ($categoryId->getSousCategory() === $this) {
                $categoryId->setSousCategory(null);
            }
        }

        return $this;
    }
}
