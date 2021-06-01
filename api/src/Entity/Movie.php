<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Bridge\Doctrine\IdGenerator\UuidV4Generator;

/**
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table("movies")
 */
class Movie
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidV4Generator::class)
     */
    private Uuid $id;

    /**
     * @ORM\ManyToOne(targetEntity=Director::class, inversedBy="movies")
     * @ORM\JoinColumn(nullable=false)
     */
    private Director $director;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $synopsis;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private string $year;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getDirector(): ?Director
    {
        return $this->director;
    }

    public function setDirector(?Director $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }
}
