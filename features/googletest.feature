Feature: google search
    In order to show relevant google search results
    As a user
    I want to perform a search

    @javascript
    Scenario: I get search results
        Given I am on the google homepage
        When I enter the search term "pound puppies"
        Then I should be on the google search results page
        And I should see at least one result about "pound puppies"
