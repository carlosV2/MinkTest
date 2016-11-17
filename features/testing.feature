Feature: Testing

  Scenario: A successful test is run
    Given I want to have my services working
    When I store data in a service in memory
    Then I should be able to find this data in the service

  Scenario: A couple of successful tests are run
    Given I want to have my services working
    When I store data in a service in memory
    Then I should be able to find this data in the service
