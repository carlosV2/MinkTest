<?php

use AppBundle\StorageConsumer;
use Behat\MinkExtension\Context\RawMinkContext;

class FeatureRawContext extends RawMinkContext
{
    /**
     * @var InMemoryStorage
     */
    private $storage;

    /**
     * @var StorageConsumer
     */
    private $consumer;

    /**
     * @param InMemoryStorage $storage
     * @param StorageConsumer $consumer
     */
    public function __construct(InMemoryStorage $storage, StorageConsumer $consumer)
    {
        $this->storage = $storage;
        $this->consumer = $consumer;
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
        $this->consumer->consumeStorage();
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
