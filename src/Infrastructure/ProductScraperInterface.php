<?php
namespace App\Infrastructure;

interface ProductScraperInterface
{
    public function scrape(string $url): void;
}