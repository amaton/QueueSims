<?php
/**
 * Plista\ coding challenge with queue simulation
 *
 * PHP Version 7
 *
 * @category SubInterface
 * @package  Plista\Sub
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */

namespace Plista\Sub;

use Plista\QueueSimsInterface;

/**
 * Sub\Factory creates subscriber
 *
 * @category Class
 * @package  Factory
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */
class Factory
{
    /**
     * Creates one consumer object depends on item type
     *
     * @param $queue QueueSimsInterface to _construct for
     *
     * @return SubInterface
     */
    public static function create(QueueSimsInterface $queue)
    {
        return new Subscriber($queue);
    }
}
