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

namespace Plista;

use Plista\Overload;

/**
 * Queue simulation
 *
 * @category Class
 * @package  QueueSim
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */
class QueueSim implements QueueSimsInterface
{
    const MAX_COUNT = 1000;

    /**
     * Main queue
     *
     * @var array containing all queue items
     */
    private $queue = [];

    /**
     * @return integer maximum items in this queue amount
     */
    public function getMaxAmount()
    {
        return self::MAX_COUNT;
    }

    /**
     * Accept one or more stdClass $items from publisher to be added to the queue
     *
     * @param \stdClass[] ...$items or several ones incoming queue items
     * @throws Overload\Exception
     * @return integer amount of queue items
     */
    public function welcome(\stdClass ...$items)
    {
        $this->queue = array_merge($this->queue, $items);
        if (count($this->queue) > self::MAX_COUNT) {
            throw new Overload\Exception();
        }
        return count($this->queue);
    }

    /**
     * @return integer count elements in current queue
     */
    public function getCount()
    {
        return count($this->queue);
    }

    /**
     * Move out one $item for subscriber to consume
     *
     * @return \stdClass $item
     */
    public function serve()
    {
        return array_shift($this->queue);
    }
}
