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


class Subscriber implements SubInterface
{
    /* @var QueueSimsInterface to consume items from */
    private $queue;

    /**
     * Subscribe to the queue
     *
     * @param $queue QueueSimsInterface to _construct for
     */
    public function __construct(QueueSimsInterface $queue)
    {
        $this->queue = $queue;
    }

    /**
     * Consume one entry from the queue
     *
     * @return boolean result
     */
    public function consume()
    {
        /* @var \stdClass $item */
        if ($item = $this->queue->serve())
        {
            echo $item->type . ' ' . $item->content . ' served and observed' . PHP_EOL;
            return true;
        } else {
            echo 'Queue is empty' . PHP_EOL;
            return false;
        }
    }
}