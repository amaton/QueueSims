<?php
/**
 * Plista\ coding challenge with queue simulation
 *
 * PHP Version 7
 *
 * @category QueueSim
 * @package  Plista
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */

require_once __DIR__ . '/vendor/autoload.php';

use Plista\Sub;
use Plista\Pub;

//Init Queue simulation
$qsim = new Plista\QueueSim();

//Init publisher
$pub = new Pub\Publisher($qsim->getMaxAmount()/5);

//Initial subscribers
$subs = [
    new Sub\Subscriber($qsim),
    new Sub\Subscriber($qsim),
    new Sub\Subscriber($qsim),
    new Sub\Subscriber($qsim)
];

try {
    $turn = 0;
    //Fo each turn it will publish random amount of emails or phones
    while ($pubs = $pub->publish(
        $qsim,
        rand(0, 1) ? new Pub\Generator\PhoneGenerator()
                            : new Pub\Generator\EmailGenerator()
    )) {
        startTurn($turn, $pubs); //Show info for turn start
        //Calculate amount of subscribers for next turn bu consuming entries from queue
        $subs = Plista\ConsumingLoadBalancer::loadBalance($qsim, 4, ...$subs);
        endTurn($pubs, $qsim->getCount(), count($subs), $turn); // Show info on turn end and sleep 3 secs
        $turn++;
    }
} catch (Plista\Overload\Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
} catch (\Exception $exception) {
    echo 'Unknown exception with message : ' . $exception->getMessage() . PHP_EOL;
} finally {
    die('Queue simulation finished');
}

/**
 * Print info about next turn
 *
 * @param $turn integer iterator
 * @param $pubs integer with published in turn amount
 */
function startTurn($turn, $pubs)
{
    echo '======= TURN ' . $turn . ' START =======' . PHP_EOL;
    echo '>>>>>>> NEW PUBLISHED ' . $pubs . ' ITEMS <<<<<<<' . PHP_EOL;
}

/**
 * Print info about last turn and sleep 3 secs
 *
 * @param $pubs integer with published in turn amount
 * @param $qcnt integer with queue amount
 * @param $subs integer with subscribers amount
 * @param $turn integer iterator
 * @return void
 */
function endTurn($pubs, $qcnt, $subs, $turn)
{
    echo '>>>>>>> LAST PUBLISHED ' . $pubs . ' ITEMS <<<<<<<' . PHP_EOL;
    echo '======= QUEUE STATUS ' . $qcnt . ' ITEMS =======' . PHP_EOL;
    echo '<<<<<<< SUBSCRIBERS COUNT ' . $subs . ' ITEMS >>>>>>>' . PHP_EOL;
    echo '======= TURN ' . $turn . ' END =======' . PHP_EOL;
    sleep(3);
}
