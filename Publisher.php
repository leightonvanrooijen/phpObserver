<?php

class Publisher implements SplSubject
{
    protected array $linkedList = [];
    protected array $observers = [];
    protected string $name;
    protected string $event;

    /**
     * Publisher constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Associate an observer
     *
     * @param SplObserver $observer
     */
    public function attach(SplObserver $observer)
    {
        $observerKey = spl_object_hash($observer);
        $this->observers[$observerKey] = $observer;
        $this->linkedList[$observerKey] = $observer->getPriority();
        arsort($this->linkedList);
    }

    /**
     * Detach an observer
     *
     * @param SplObserver $observer
     */
    public function detach(SplObserver $observer)
    {
        $observerKey = spl_object_hash($observer);
        unset($this->observers[$observerKey]);
        unset($this->linkedList[$observerKey]);
    }

    /**
     * Notifies and updates all observers in the linkedList
     */
    public function notify()
    {
        foreach ($this->linkedList as $key => $value) {
            $this->observers[$key]->update($this);
        }
    }

    /**
     * Sets event for observers then notifies them
     *
     * @param $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
        $this->notify();
    }

    /**
     * Returns the current event
     *
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * Returns the list of observers
     *
     * @return mixed
     */
    public function getSubscribers()
    {
        return $this->getSubscribers();
    }

}
