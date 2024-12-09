<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, OrderItem>
     */
    #[ORM\OneToMany(targetEntity: OrderItem::class, mappedBy: 'orderOfOrderItem')]
    private Collection $orderItemOfOrder;

    public function __construct()
    {
        $this->orderItemOfOrder = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Collection<int, OrderItem>
     */
    public function getOrderItemOfOrder(): Collection
    {
        return $this->orderItemOfOrder;
    }

    public function addOrderItemOfOrder(OrderItem $orderItemOfOrder): static
    {
        if (!$this->orderItemOfOrder->contains($orderItemOfOrder)) {
            $this->orderItemOfOrder->add($orderItemOfOrder);
            $orderItemOfOrder->setOrderOfOrderItem($this);
        }

        return $this;
    }

    public function removeOrderItemOfOrder(OrderItem $orderItemOfOrder): static
    {
        if ($this->orderItemOfOrder->removeElement($orderItemOfOrder)) {
            // set the owning side to null (unless already changed)
            if ($orderItemOfOrder->getOrderOfOrderItem() === $this) {
                $orderItemOfOrder->setOrderOfOrderItem(null);
            }
        }

        return $this;
    }


}
