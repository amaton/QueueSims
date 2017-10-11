<?php
/**
 * Plista\ coding challenge with queue simulation
 *
 * PHP Version 7
 *
 * @category ConsumingLoadBalancer
 * @package  Plista
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */

namespace Plista;

use Plista\Sub;

/**
 * Queue simulation
 *
 * @category Interface
 * @package  ConsumingLoadBalancer
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */
interface LbInterface
{
    /**
     * Balancing subscribers amount
     *
     * @param $qsim QueueSimsInterface to subscribe for
     * @param $subs ...Sub\SubInterface collection of subscribers
     *
     * @return array of subscribers
     */
    public static function loadBalance(QueueSimsInterface $queue, Sub\SubInterface ...$subscribers);
}
