Feature:
    ...

    Scenario: It list a all available user's emails
        Given I have a user with email "test@example.com"
        When I go to "/users"
        Then I should see "test@example.com"
