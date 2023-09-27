Feature: Products feature

    Scenario: Create a product
        Given a product data
            | name               | sku       | description        | price | quantity |
            | test behat product | Test-P-10 | Test behat product | 222.0 | 3        |
        When make the create product request
        Then the product should have been created