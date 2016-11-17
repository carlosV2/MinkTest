<?php

use Behat\MinkExtension\Context\RawMinkContext;

class FeatureMinkContext extends RawMinkContext
{
    /**
     * @var InMemoryStorage
     */
    private $storage;

    /**
     * @param InMemoryStorage $storage
     */
    public function __construct(InMemoryStorage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @Given I want to have my services working
     */
    public function iWantToHaveMyServicesWorking()
    {
        $this->storage->save('age', 30);
    }

    /**
     * @When I store data in a service in memory
     */
    public function iStoreDataInAServiceInMemory()
    {
        $this->getSession()->visit('/');

        $this->assertSession()->statusCodeEquals(200);
    }

    /**
     * @Then I should be able to find this data in the service
     */
    public function iShouldBeAbleToFindThisDataInTheService()
    {
        PHPUnit_Framework_Assert::assertEquals(['age', 'name'], $this->storage->getKeys());
        PHPUnit_Framework_Assert::assertEquals(30, $this->storage->getFromKey('age'));
        PHPUnit_Framework_Assert::assertEquals('carlos', $this->storage->getFromKey('name'));
    }
}
