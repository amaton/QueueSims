<?php
/**
 * Plista\ coding challenge with queue simulation
 *
 * PHP Version 7
 *
 * @category QueueSimsInterface
 * @package  Plista
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */

namespace Plista;

/**
 * Queue simulation interface
 *
 * @category Interface
 * @package  QueueSimsInterface
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */
interface QueueSimsInterface
{
    /**
     * Accept one or more stdClass $items to be added to the queue
     *
     * @param \stdClass[] ...$items or several ones incoming queue items
     * @throws Overload\Exception
     * @return mixed
     */
    public function welcome(\stdClass ...$items);

    /**
     * Move out one $item for subscriber to consume
     *
     * @return \stdClass $item
     */
    public function serve();

    /**
     * @return integer count elements in current queue
     */
    public function getCount();

    /**
     * @return integer maximum items in this queue amount
     */
    public function getMaxAmount();
}
