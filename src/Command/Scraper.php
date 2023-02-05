<?php
declare(strict_types=1);

namespace App\Command;

use App\Domain\ProductCollection;
use App\Infrastructure\ProductScraperInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Scraper extends Command
{
    const URL = 'https://wltest.dns-systems.net';

    public function __construct(
        private ProductScraperInterface $productScraper,
        private ProductCollection $productCollection
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('app:scrape')
            ->setDescription('scrape URL https://wltest.dns-systems.net/')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->productScraper->scrape(self::URL);

        $output->write($this->productCollection->getSortedJson());

        return 0;
    }
}
