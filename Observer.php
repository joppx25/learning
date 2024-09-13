<?php

interface Observer
{
    public function update(User $user);
}

class EmailNotifier implements Observer
{
    public function update(User $user): void
    {
        echo "Notifiy From Email: " . $user->getFullname() . "\n";
    }
}

class Logger implements Observer
{
    public function update(User $user): void
    {
        echo "Notifiy From Logger: " . $user->getFullname() . "\n";
    }
}

class User
{
    private $firstName;
    private $lastName;
    private $obj = [];

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
    }

    public function getFullname(): string
    {
        return $this->firstName . $this->lastName;
    }

    public function attach(Observer $obj)
    {
        $this->obj[] = $obj;
    }

    public function register()
    {
        $this->notify();
    }

    public function notify()
    {
        foreach ($this->obj as $obj) {
            $obj->update($this);
        }
    }
}

// Test
$test = new User('Maria', 'Clara');
$test->attach(new EmailNotifier());
$test->attach(new Logger());
$test->register();
