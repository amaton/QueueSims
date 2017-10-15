# QueueSims
Plista CodingChallenge - small example of architecture which simulates queue of incoming email and phones items
(https://gist.github.com/philipphoffmann/81eec90c03269c44b06695ab969b1426);

Plista\QueueSim - main queue component;

Plista\ConsumingLoadBalancer - example of LB implementation using antifragile methodology
(https://en.wikipedia.org/wiki/Antifragility) with additional subscriber after each other successful consume
and removing all extra ones ones queue is empty.
That means that on very start of simulation subscribers amount will growth exponentially till queue is run out;
Most of the rest cases system will have empty queue and double more subscribers then messages was published this turn;

Plista\Pub\ - publisher component to publish unpredictable amount of items to the queue
(you can set up  min and max in constructor);
Plista\Pub\Generator - generator component for different messages types;

Plista\Sub\ - subscriber component to get and observe one item from queue;
Plista\Sub\Consumer - consumer component for different messages types;

qsims.php - main simulation component to run, it runs infinitely turn by turn (current highscore 55 000 iterations), on each turn we publish some amount of records to queue (from one to queueMax/5 = 1000/5 = 200) and runs some amount of subscribers, calculated with load balancer;

To install component:

composer install

To run simulation:

php qsims.php

To runt tests:

vendor/bin/phpunit
(would be installed by composer)
