<?php

namespace App\Domain;

class ProductCollection
{
    private array $products = [];

    public function __construct(Product ...$product)
    {
        $this->products = $product;
    }

    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    public function all(): array
    {
        return $this->products;
    }

    public function getSortedJson(): string
    {
        $sorted = [];
        foreach ($this->products as $product) {
            $sorted[] = [
                'title' => $product->getTitle(),
                'description' => $product->getDescription(),
                'price' => $this->getPrice($product),
                'discount' => $product->getDiscount()
            ];
        }

        $key_values = array_column($sorted, 'price');
        array_multisort($key_values, SORT_DESC, $sorted);

        return json_encode($sorted, JSON_PRETTY_PRINT);
    }

    private function getPrice(Product $product): float
    {
        if($product->isMonthly()) {
            return $product->getPrice() * 12;
        }

        return $product->getPrice();
    }
}
