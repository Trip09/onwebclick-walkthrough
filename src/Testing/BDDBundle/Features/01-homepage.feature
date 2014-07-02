# src/Testing/BDDBundle/Features/01-homepage.feature
Feature: When visit the homepage I should see the list of movies

  Scenario: View the home page
    Given I am on the homepage
    Then I should see "Movie list"