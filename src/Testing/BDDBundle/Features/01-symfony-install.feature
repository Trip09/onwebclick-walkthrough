# src/My/BDDBundle/Features/01-symfony-install.feature
Feature: Fresh Symfony installation
  In order to start developing a Symfony application
  As a smart developer
  I need to be able to see the default Symfony Standard Edition Home page

  Scenario: View the home page
    Given I am on the homepage
    Then I should see "No route found"