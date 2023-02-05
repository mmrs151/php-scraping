<?php

namespace spec\App\Domain;

use App\Domain\Product;
use Goutte\Client;
use PhpSpec\ObjectBehavior;

class ProductSpec extends ObjectBehavior
{
    function let(Client $client)
    {
        $this->beConstructedWith('title', 'description', 170, 2.5);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Product::class);
    }

    function it_should_get_title()
    {
        $this->setTitle('new title');
        $this->getTitle()->shouldBe('new title');
    }

    function it_should_get_description()
    {
        $this->setDescription('new description');
        $this->getDescription()->shouldBe('new description');
    }

    function it_should_get_price()
    {
        $this->setPrice(floatval(121.5));
        $this->getPrice()->shouldBe(121.5);
    }

    function it_should_get_discount()
    {
        $this->setDiscount(0.0);
        $this->getDiscount()->shouldBe(0.0);
    }

    function it_should_get_is_monthly()
    {
        $this->setIsMonthly(true);
        $this->isMonthly()->shouldBe(true);
    }
}
