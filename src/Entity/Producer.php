<?php

namespace App\Entity;

use App\Repository\ProducerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProducerRepository::class)]
class Producer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'Producer', targetEntity: Catalogs::class)]
    private Collection $catalogs;

    public function __construct()
    {
        $this->catalogs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Catalogs>
     */
    public function getCatalogs(): Collection
    {
        return $this->catalogs;
    }

    public function addCatalog(Catalogs $catalog): self
    {
        if (!$this->catalogs->contains($catalog)) {
            $this->catalogs->add($catalog);
            $catalog->setProducer($this);
        }

        return $this;
    }

    public function removeCatalog(Catalogs $catalog): self
    {
        if ($this->catalogs->removeElement($catalog)) {
            // set the owning side to null (unless already changed)
            if ($catalog->getProducer() === $this) {
                $catalog->setProducer(null);
            }
        }

        return $this;
    }
}
