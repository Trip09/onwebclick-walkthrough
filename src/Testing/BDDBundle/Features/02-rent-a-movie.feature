# src/Testing/BDDBundle/Features/02-rent-a-movie.feature
Feature: As a user I should be able to Rent a movie

  Scenario: Visit the homepage
    Given I am on the homepage
    Then I should see "Movie list"

  Scenario: After beeing in the homepage I should be
    able to choose a movie to rent
    Given I am on the homepage
    And I follow "movie-4"
    Then I should see "MovieRented creation"

  Scenario: Rent a movie
    Given I am on "/rent/4"
    And I fill in "igniteyourproject_base_moviebundle_movierented_web_renter_name" with "Joao Albuquerque"
    And I fill in "igniteyourproject_base_moviebundle_movierented_web_renter_mobile" with "99987789"
    And I press "Checkout"
    Then I should see "Movie List"
