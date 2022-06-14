<?php

declare(strict_types=1);

namespace App\Twitter;

use Symfony\Contracts\Cache\CacheInterface;

final class Cached {

    public function __construct(
        private readonly CacheInterface $cache,
        private readonly Client $decoratedClient,
    ) {}

    public function renderTweet(string $id): string
    {
        // Check if cached result and return it if yes

        $result = $this->decoratedClient->renderTweet($id);

        // Cache result

        return $result;
    }
}