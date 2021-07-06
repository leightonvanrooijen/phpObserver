<?php

class Observer implements SplObserver
{
    protected string $name;
    protected int $priority = 0;

    /**
     * Observer constructor
     *
     * @param string $name
     * @param int $priority
     */
    public function __construct(string $name, int $priority = 0)
    {
        $this->name = $name;
        $this->priority = $priority;
    }

    /**
     * Receives update from subject then prints result
     *
     * @param SplSubject $subject
     */
    public function update(SplSubject $subject)
    {
        echo $this->name . ': ' . $subject->getEvent() . PHP_EOL;
    }

    /**
     * Gets the priority of Observer
     *
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }
}
