<?php

require_once 'Observer.php';
require_once 'Publisher.php';

$NotifcationPub = new Publisher('NotifcationPub');

$emailObserver =  new Observer('EmailObserver', 30);
$messageObserver = new Observer('MessageObserver', 20);

// Attach Observers
$NotifcationPub->attach($emailObserver);
$NotifcationPub->attach($messageObserver);

// Set event to be broadcast
$NotifcationPub->setEvent("Look I'm a event :)");

