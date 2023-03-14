<?php

namespace App\Services\Dto;

class ItemCreateDto
{
    public function __construct
    (
        public string $name,
        public string $type,
        public float $price,
//        public string $measurement,
        public string $description,
//        public string $inventory,
        public float $minQuantity,
        public float $increment,

    ){}

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

//    public function getMeasurement(): string
//    {
//        return $this->measurement;
//    }

//    public function getInventory(): string
//    {
//        return $this->inventory;
//    }

    public function getMinQuantity(): float
    {
        return $this->minQuantity;
    }

    public function getIncrement(): float
    {
        return $this->increment;
    }
}
