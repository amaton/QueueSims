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
 * @category Class
 * @package  ConsumingLoadBalancer
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */
class ConsumingLoadBalancer implements LbInterface
{
    /**
     * Balancing subscribers amount
     *
     * @param $queue QueueSimsInterface to subscribe for
     * @param $subscribers ...Sub\SubInterface collection of subscribers
     *
     * @return array of subscribers
     */
    public static function loadBalance(QueueSimsInterface $queue, Sub\SubInterface ...$subscribers)
    {
        $empty = false;
        foreach ($subscribers as $key => $subscriber) {
            /* @var \Plista\Sub\SubInterface $subscriber */
            if (!$empty && $subscriber->consume()) {
                $subscribers[] = new Sub\Subscriber($queue);
            } else {
                unset($subscribers[$key]);
                $empty = true;
            }
        }
        return $subscribers;
    }
}