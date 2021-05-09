<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BikeRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Bridge\Doctrine\IdGenerator\UuidV4Generator;

/**
 * @ApiResource(
 *      normalizationContext={"groups"="bike.read"},
 *      denormalizationContext={"groups"="bike.write"}
 * )
 * @ORM\Table("bikes")
 * @ORM\Entity(repositoryClass=BikeRepository::class)
 */
class Bike
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidV4Generator::class)
     * @Groups({"bike.read"})
     */
    private Uuid $id;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="bikes")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"bike.read", "bike.write"})
     */
    private Brand $brand;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"bike.read", "bike.write"})
     */
    private string $model;

    /**
     * @ORM\Column(type="string", length=4)
     * @Groups({"bike.read", "bike.write"})
     */
    private string $year;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

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
