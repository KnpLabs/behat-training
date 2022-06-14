<?php

declare(strict_types=1);

namespace App\Twitter;

use Symfony\Contracts\HttpClient\HttpClientInterface;

final class Client implements ClientInterface {
    public function __construct(
        private readonly HttpClientInterface $httpClient,
    ) {}

    public function renderTweet(string $id): string
    {
        // Call Twitter services via http client

        return '<rendered-tweet>';
    }
}