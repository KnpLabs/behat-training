<?php

declare(strict_types=1);

namespace App\Twitter;

use Psr\Log\LoggerInterface;

final class Logged {

    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly Client $decoratedClient,
    ) {}

    public function renderTweet(string $id): string
    {
        // Log things

        return $this->decoratedClient->renderTweet($id);
    }
}