<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use Behat\Behat\Tester\Exception\PendingException;
use App\Entity\User;
use App\Tests\Behat\Helper\Doctrine;
use Behat\Behat\Context\Context;

final class FeatureContext implements Context
{
    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @BeforeScenario
     */
    public function beforeScenario(): void
    {
        $this->doctrine->truncate();
    }

    /**
     * @Given I have a user with email :email
     */
    public function iHaveAUserWithEmail($email)
    {
        $this->doctrine->save(
            new User($email, 'password')
        );
    }
}
