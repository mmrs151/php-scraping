<?php

namespace spec\App\Command;

use App\Command\Scraper;
use App\Domain\ProductCollection;
use App\Infrastructure\ProductScraperInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ScraperSpec extends ObjectBehavior
{
    function let(
        InputInterface $input,
        ProductScraperInterface $productScraper,
        ProductCollection $productCollection
    )
    {
        $input->isInteractive()->willReturn(false);
        $input->hasArgument('command')->willReturn(false);
        $input->bind(Argument::cetera())->willReturn();
        $input->validate()->willReturn();

        $this->beConstructedWith($productScraper, $productCollection);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Scraper::class);
    }

    function it_should_scrape(
        InputInterface $input,
        OutputInterface $output,
        ProductScraperInterface $productScraper,
        ProductCollection $productCollection
    )
    {
        $productScraper->scrape('https://wltest.dns-systems.net')->shouldBeCalled();

        $productCollection->getSortedJson()->shouldBeCalled()->willReturn(json_encode([], JSON_PRETTY_PRINT));

        $this->run($input, $output);
    }
}
