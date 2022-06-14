<?php

declare(strict_types=1);

namespace App\Twitter;

final class Fake {

    private array $calls = [];

    public function renderTweet(string $id): string
    {
        $this->calls[] = [$id];

        return '<fake-rendered-tweet>';
    }

    public function getCalls(): array
    {
        return $this->calls;
    }
}