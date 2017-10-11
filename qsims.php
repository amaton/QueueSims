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

$qsim = new Plista\QueueSim();
$pub = new Pub\Publisher();
$subs = [
    new Sub\Subscriber($qsim),
    new Sub\Subscriber($qsim),
    new Sub\Subscriber($qsim),
    new Sub\Subscriber($qsim)
];
$turn = 0;

/**
 * Balancing subscribers amount
 *
 * @param $subs array of subscribers
 * @param $qsim \Plista\QueueSimsInterface to subscribe for
 * @return array of subscribers
 */
function loadBalance($subs, $qsim)
{
    $empty = false;
    foreach ($subs as $key => $subscriber) {
        /* @var \Plista\Sub\SubInterface $subscriber */
        if (!$empty && $subscriber->consume()) {
            $subs[] = new Plista\Sub\Subscriber($qsim);
        } else {
            unset($subs[$key]);
            $empty = true;
        }
    }
    return $subs;
}

try {
    while ($pubs = $pub->publish(
        $qsim,
        rand(0, 1) ? new Pub\Generator\PhoneGenerator()
                            : new Pub\Generator\EmailGenerator()
    )) {
        startTurn($turn, $pubs);
        $subs = loadBalance($subs, $qsim);
        endTurn($pubs, $qsim->getCount(), count($subs), $turn);
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
