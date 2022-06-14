<?php

declare(strict_types=1);

namespace App\Twitter;

interface ClientInterface {

    public function renderTweet(string $id): string;
}