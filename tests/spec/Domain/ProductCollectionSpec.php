<?php

namespace spec\App\Domain;

use App\Domain\Product;
use App\Domain\ProductCollection;
use PhpSpec\ObjectBehavior;

class ProductCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ProductCollection::class);
    }

    function it_should_add_product(Product $product)
    {
        $this->add($product);
        $this->add($product);
        $this->all()->shouldHaveCount(2);
    }

    function it_should_sort_products()
    {
        $product1 = new Product('one', 'one desc', 1.5, 0.1);
        $product2 = new Product('two', 'two desc', 11.90, 0.2);

        $this->add($product1);
        $this->add($product2);

        $result = [
            [
                "title" => "two",
                "description"=> "two desc",
                "price"=> 11.9,
                "discount"=> 0.2
            ],
            [
                "title"=> "one",
                "description"=> "one desc",
                "price"=> 1.5,
                "discount"=> 0.1
            ]
        ];

        $this->getSortedJson()->shouldBe(json_encode($result, JSON_PRETTY_PRINT));
    }
}
