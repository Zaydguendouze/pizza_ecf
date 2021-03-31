<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pizzas")
 * @ORM\Entity(repositoryClass=PizzaRepository::class)
 */
class Pizza
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $pizza_name;

    /**
     * @ORM\ManyToOne(targetEntity=Base::class, inversedBy="pizzas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pizza_base;

    /**
     * @ORM\ManyToOne(targetEntity=Size::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $pizza_size;

    /**
     * @ORM\ManyToMany(targetEntity=Ingredient::class, inversedBy="pizzas")
     */
    private $pizza_ingredients;

    public function __construct()
    {
        $this->pizza_ingredients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPizzaName(): ?string
    {
        return $this->pizza_name;
    }

    public function setPizzaName(string $pizza_name): self
    {
        $this->pizza_name = $pizza_name;

        return $this;
    }

    public function getPizzaBase(): ?Base
    {
        return $this->pizza_base;
    }

    public function setPizzaBase(?Base $pizza_base): self
    {
        $this->pizza_base = $pizza_base;

        return $this;
    }

    public function getPizzaSize(): ?Size
    {
        return $this->pizza_size;
    }

    public function setPizzaSize(?Size $pizza_size): self
    {
        $this->pizza_size = $pizza_size;

        return $this;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getPizzaIngredients(): Collection
    {
        return $this->pizza_ingredients;
    }

    public function addPizzaIngredient(Ingredient $pizzaIngredient): self
    {
        if (!$this->pizza_ingredients->contains($pizzaIngredient)) {
            $this->pizza_ingredients[] = $pizzaIngredient;
        }

        return $this;
    }

    public function removePizzaIngredient(Ingredient $pizzaIngredient): self
    {
        $this->pizza_ingredients->removeElement($pizzaIngredient);

        return $this;
    }
}
