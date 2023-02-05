<?php
declare(strict_types=1);

namespace App\Domain;

class Product
{
    private bool $isMonthly=false;

    public function __construct(
        private string $title,
        private string $description,
        private float $price,
        private float $discount
    )
    {
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return bool
     */
    public function isMonthly(): bool
    {
        return $this->isMonthly;
    }

    /**
     * @param bool $isMonthly
     */
    public function setIsMonthly(bool $isMonthly): void
    {
        $this->isMonthly = $isMonthly;
    }


}
