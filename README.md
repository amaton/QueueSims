# QueueSims
Plista CodingChallenge - small example of architecture which simulates queue of incoming email and phones items;

Plista\QueueSim - main queue component;

Plista\Pub\ - publisher component;
Plista\Pub\Generator - generator component for different messages types;

Plista\Sub\ - subscriber component;
Plista\Sub\Consumer - consumer component for different messages types;

qsims.php - main simulation component with load balancing;

To install component:
composer install

To run simulation:
php qsims.php

To runt tests:
vendor/bin/phpunit (would be installed by composer)
