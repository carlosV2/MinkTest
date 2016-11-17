<?php

namespace AppBundle;

class StorageConsumer
{
    /**
     * @var \InMemoryStorage
     */
    private $storage;

    /**
     * @param \InMemoryStorage $storage
     */
    public function __construct(\InMemoryStorage $storage)
    {
        $this->storage = $storage;
    }

    public function consumeStorage()
    {
        $this->storage->save('name', 'carlos');
    }
}
