<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ServiceCouscous;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $famille;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceCouscous(): ?string
    {
        return $this->ServiceCouscous;
    }

    public function setServiceCouscous(string $ServiceCouscous): self
    {
        $this->ServiceCouscous = $ServiceCouscous;

        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(string $famille): self
    {
        $this->famille = $famille;

        

        return $this;
    }
}

$ServiceCouscousRouna = new Product();
$ServiceCouscousRouna->setName('Service à Couscous Rouna');
$ServiceCouscousRouna->setFamille('Service à Couscous Rouna');
$ServiceCouscousRouna->setDescription('Ce produit est un Service à Couscous Rouna');
$ServiceCouscousRouna->setPrice('69 euros');
$ServiceCouscousRouna->setQuantity('30');

echo "Name: " . $ServiceCouscousRouna->getName('Service à Couscous Rouna');
echo "<br>";
echo "Quantity: " . $ServiceCouscousRouna->getQuantity('30');
?>
