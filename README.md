# QueueSims
Plista CodingChallenge - small example of architecture which simulates queue of incoming email and phones items;

Plista\QueueSim - main queue component;

Plista\ConsumingLoadBalancer - example of LB implementation using antifragile methodology
(https://en.wikipedia.org/wiki/Antifragility) by adding aditional subscriber after each other successful consume
and removing all extra ones ones queue is empty.
That means that on very start of simulation subscribers amount will growth exponentially till queue is run out;
Most of the rest cases system will have empty queue and and double more subscribers then messages was publishhed this turn;

Plista\Pub\ - publisher component to publish unpredictable amount of items to the queue
(you can set up  min and max in constructor);
Plista\Pub\Generator - generator component for different messages types;

Plista\Sub\ - subscriber component to get and observe one item from queue;
Plista\Sub\Consumer - consumer component for different messages types;

qsims.php - main simulation component to run, it runs infinitely turn by turn, on each turn we publish some amount of records to 
queue (from one to queueMax/5 = 1000/5 = 200) and runs some amount of subscribers, calculated with load balancer;

To install component:

composer install

To run simulation:

php qsims.php

To runt tests:

vendor/bin/phpunit (would be installed by composer)
