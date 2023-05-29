<?php

namespace App\Entity;

use App\Repository\CatalogsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatalogsRepository::class)]
class Catalogs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $System = null;
    
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateAdded = null;

    #[ORM\ManyToOne(inversedBy: 'catalogs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Producer $Producer = null;

    #[ORM\Column(type: 'string')]
    private $catalogFilename;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSystem(): ?string
    {
        return $this->System;
    }

    public function setSystem(string $System): self
    {
        $this->System = $System;

        return $this;
    }

    public function getDateAdded(): ?\DateTimeInterface
    {
        return $this->DateAdded;
    }

    public function setDateAdded(\DateTimeInterface $DateAdded): self
    {
        $this->DateAdded = $DateAdded;

        return $this;
    }

    public function getProducer(): ?Producer
    {
        return $this->Producer;
    }

    public function setProducer(?Producer $Producer): self
    {
        $this->Producer = $Producer;

        return $this;
    }

    public function getCatalogFilename(): string
    {
        return $this->catalogFilename;
    }

    public function setCatalogFilename(string $catalogFilename): self
    {
        $this->catalogFilename = $catalogFilename;

        return $this;
    }
}
