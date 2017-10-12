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
 * Interface for implementing subscriber functionality
 *
 * @category Interface
 * @package  SubInterface
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */
interface SubInterface
{
    /**
     * Subscribe to the queue
     *
     * @param $queue QueueSimsInterface to _construct for
     *
     * @return $this
     */
    public function __construct(QueueSimsInterface $queue);

    /**
     * Consume one entry from the queue
     *
     * @return boolean results true in case of success or false in case of empty queue
     */
    public function consume();
}
