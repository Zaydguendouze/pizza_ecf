<?php

namespace App\Entity;

use App\Repository\SizeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sizes")
 * @ORM\Entity(repositoryClass=SizeRepository::class)
 */
class Size
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $size_name;

    /**
     * @ORM\Column(type="float")
     */
    private $size_price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSizeName(): ?string
    {
        return $this->size_name;
    }

    public function setSizeName(string $size_name): self
    {
        $this->size_name = $size_name;

        return $this;
    }

    public function getSizePrice(): ?float
    {
        return $this->size_price;
    }

    public function setSizePrice(float $size_price): self
    {
        $this->size_price = $size_price;

        return $this;
    }
}
