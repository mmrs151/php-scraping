<?php
declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\Product;
use App\Domain\ProductCollection;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class ProductScraper implements ProductScraperInterface
{
    public function __construct(
        private Client $client,
        private ProductCollection $productCollection
    )
    {
    }

    public function scrape(string $url): void
    {
        $crawler = $this->client->request('GET', $url);
        try {
            $crawler->filter('.package')->each(
                function ($node) {
                    /** @var Crawler $node */
                    $title = $node->filter('div.header')->text();
                    $description = $node->filter('div.package-name')->text();
                    $price = $this->getNumbers($node->filter('span.price-big')->innertext());
                    $discount = $this->getNumbers($node->filter('div.package-price > p')->text(''));
                    $isMonth = $this->isMonth($node->filter('div.package-price')->text());

                    $this->addModel($title, $description, $price, $discount, $isMonth);
                }
            );
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }

    private function getNumbers(string $discount): float
    {
        return floatval(preg_replace('/[^0-9\.]/', "", $discount));
    }

    private function isMonth(string $text): bool
    {
        return str_contains($text, 'Per Month');
    }

    private function addModel(string $title, string $description, float $price, float $discount, bool $isMonth)
    {
        $model = new Product($title, $description, $price, $discount);
        $model->setIsMonthly($isMonth);
        $this->productCollection->add($model);
    }

}
