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

$qsim = new Plista\QueueSim();
$pub = new Plista\Pub\Publisher();
$subs[] = new Plista\Sub\Subscriber($qsim);
$turn = 0;
try {
    while ($pubs = $pub->publish($qsim, rand(0,1) ? new \Plista\Pub\Generator\PhoneGenerator()
                                                            : new \Plista\Pub\Generator\EmailGenerator()))
    {
        echo '======= TURN ' . $turn . ' =======' . PHP_EOL;
        echo '>>>>>>> PUBLISHED ' . $pubs . ' ITEMS <<<<<<<' . PHP_EOL;
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
        echo '<<<<<<< QUEUE STATUS ' . count($qsim->getQueue()) . ' ITEMS >>>>>>>' . PHP_EOL;
        echo '<<<<<<< SUBSCRIBERS COUNT ' . count($subs) . ' ITEMS >>>>>>>' . PHP_EOL;
        sleep(3); $turn++;
    }
} catch (Plista\Overload\Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
} catch (\Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
} finally {
    die('Queue simulation finished');
}