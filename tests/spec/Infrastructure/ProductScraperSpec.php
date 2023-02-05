<?php

namespace spec\App\Infrastructure;

use App\Domain\Product;
use App\Domain\ProductCollection;
use App\Infrastructure\ProductScraper;
use Goutte\Client;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DomCrawler\Crawler;

class ProductScraperSpec extends ObjectBehavior
{
    function let(Client $client, ProductCollection $productCollection)
    {
        $this->beConstructedWith($client, $productCollection);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ProductScraper::class);
    }

    function it_can_scrape(
        Client $client,
        ProductCollection $productCollection,
        Crawler $crawler,
        Product $product,
        Crawler $node
    )
    {
        $client->request('GET', 'http://URL')
            ->shouldBeCalled()
            ->willReturn($crawler);

        $crawler->filter('.package')
            ->shouldBeCalled()
            ->willReturn($crawler);
/*
        $crawler->filter('div.header')->shouldBeCalled()->willReturn($crawler);
        $crawler->text()->shouldBeCalled()->willReturn('');

        $crawler->filter('div.package-name')->shouldBeCalled()->willReturn($crawler);
        $crawler->text()->shouldBeCalled()->willReturn('');

        $crawler->filter('span.price-big')->shouldBeCalled()->willReturn($crawler);
        $crawler->text()->shouldBeCalled()->willReturn('');

        $crawler->filter('div.package-price > p')->shouldBeCalled()->willReturn($crawler);
        $crawler->text()->shouldBeCalled()->willReturn('');

        $crawler->filter('div.package-price')->shouldBeCalled()->willReturn($crawler);
        $crawler->text()->shouldBeCalled()->willReturn('');
*/

        /* @var Crawler $crawler */
        $crawler->each(Argument::that(function ($node){
            return $node;
        }))->shouldBeCalled()->willReturn(['title', 'description', 121, 4.3]);

        $this->scrape('http://URL');
    }
}
